<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\Form;
use App\Models\Deposit;
use App\Lib\FormProcessor;
use App\Models\Transaction;
use App\Constants\ManageStatus;
use App\Lib\GoogleAuthenticator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    function home() {
        $pageTitle  = 'Dashboard';
        $kycContent = getSiteData('kyc.content', true);
        $user       = auth()->user();

        $user->loadCount(['campaigns', 'campaigns as pending_campaigns' => function ($query) {
            $query->pending();
        }, 'campaigns as approved_campaigns' => function ($query) {
            $query->approve();
        }, 'campaigns as rejected_campaigns' => function ($query) {
            $query->reject();
        }]);

        $widgetData['campaignCount']         = $user->campaigns_count;
        $widgetData['pendingCampaignCount']  = $user->pending_campaigns;
        $widgetData['approvedCampaignCount'] = $user->approved_campaigns;
        $widgetData['rejectedCampaignCount'] = $user->rejected_campaigns;
        $campaigns                           = $user->campaigns()->pluck('id');
        $widgetData['receivedDonation']      = Deposit::whereIn('campaign_id', $campaigns)->done()->sum('amount');
        $widgetData['sendDonation']          = Deposit::where('user_id', $user->id)->done()->sum('amount');
        $widgetData['withdrawalAmount']      = $user->withdrawals()->done()->sum('amount');

        return view($this->activeTheme . 'user.page.dashboard', compact('pageTitle', 'kycContent', 'user', 'widgetData'));
    }

    function kycForm() {
        if (auth()->user()->kc == ManageStatus::PENDING) {
            $toast[] = ['warning', 'Your identity verification is being processed'];

            return back()->withToasts($toast);
        }

        if (auth()->user()->kc == ManageStatus::VERIFIED) {
            $toast[] = ['success', 'Your identity verification is being succeed'];

            return back()->withToasts($toast);
        }

        $pageTitle = 'Identification Form';
        $form      = Form::where('act', 'kyc')->first();

        return view($this->activeTheme . 'user.kyc.form', compact('pageTitle', 'form'));
    }

    function kycSubmit() {
        $form           = Form::where('act', 'kyc')->first();
        $formData       = $form->form_data;
        $formProcessor  = new FormProcessor();
        $validationRule = $formProcessor->valueValidation($formData);

        request()->validate($validationRule);

        $userData       = $formProcessor->processFormData(request(), $formData);
        $user           = auth()->user();
        $user->kyc_data = $userData;
        $user->kc       = ManageStatus::PENDING;
        $user->save();

        $toast[] = ['success', 'Your identity verification information has been received'];

        return to_route('user.home')->withToasts($toast);
    }

    function kycData() {
        $pageTitle = 'Identification Information';
        $user      = auth()->user();

        return view($this->activeTheme . 'user.kyc.info', compact('pageTitle', 'user'));
    }

    function profile() {
        $pageTitle = 'Profile Settings';
        $user      = auth()->user();

        return view($this->activeTheme . 'user.page.profile', compact('pageTitle', 'user'));
    }

    function profileUpdate() {
        $this->validate(request(), [
            'firstname' => 'required|string',
            'lastname'  => 'required|string',
            'image'     => ['nullable', File::types(['png', 'jpg', 'jpeg'])],
        ], [
            'firstname.required' => 'First name field is required',
            'lastname.required'  => 'Last name field is required'
        ]);

        $user = auth()->user();

        if (request()->hasFile('image')) {
            try {
                $user->image = fileUploader(request('image'), getFilePath('userProfile'), getFileSize('userProfile'), $user->image);
            } catch (Exception) {
                $toast[] = ['error', 'Image uploading process has failed'];

                return back()->withToasts($toast);
            }
        }

        $user->firstname = request('firstname');
        $user->lastname  = request('lastname');

        $user->address = [
            'state'   => request('state'),
            'zip'     => request('zip'),
            'city'    => request('city'),
            'address' => request('address'),
        ];

        $user->save();

        $toast[] = ['success', 'Your profile has updated'];

        return back()->withToasts($toast);
    }

    function password() {
        $pageTitle = 'Change Password';

        return view($this->activeTheme . 'user.page.password', compact('pageTitle'));
    }

    function passwordChange() {
        $passwordValidation = Password::min(6);

        if (bs('strong_pass')) {
            $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $this->validate(request(), [
            'current_password' => 'required',
            'password'         => ['required', 'confirmed', $passwordValidation],
        ]);

        $user = auth()->user();

        if (!Hash::check(request('current_password'), $user->password)) {
            $toast[] = ['error', 'Current password mismatched!'];

            return back()->withToasts($toast);
        }

        $user->password = Hash::make(request('password'));
        $user->save();

        $toast[] = ['success', 'Your password has changed'];

        return back()->withToasts($toast);
    }

    function show2faForm() {
        $ga        = new GoogleAuthenticator();
        $user      = auth()->user();
        $secret    = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . bs('site_name'), $secret);
        $pageTitle = '2FA Settings';

        return view($this->activeTheme . 'user.page.twoFactor', compact('pageTitle', 'secret', 'qrCodeUrl', 'user'));
    }

    function enable2fa() {
        $user = auth()->user();

        $this->validate(request(), [
            'key'    => 'required',
            'code'   => 'required|array|min:6',
            'code.*' => 'required|integer',
        ]);

        $verCode  = (int)(implode("", request('code')));
        $response = verifyG2fa($user, $verCode, request('key'));

        if ($response) {
            $user->tsc = request('key');
            $user->ts  = ManageStatus::YES;
            $user->save();

            $toast[] = ['success', 'Two factor authenticator successfully activated'];

            return back()->withToasts($toast);
        } else {
            $toast[] = ['error', 'Wrong verification code'];

            return back()->withToasts($toast);
        }
    }

    function disable2fa() {
        $this->validate(request(), [
            'code'   => 'required|array|min:6',
            'code.*' => 'required|integer',
        ]);

        $verCode  = (int)(implode("", request('code')));
        $user     = auth()->user();
        $response = verifyG2fa($user, $verCode);

        if ($response) {
            $user->tsc = null;
            $user->ts  = ManageStatus::NO;
            $user->save();

            $toast[] = ['success', 'Two factor authenticator successfully deactivated'];
        } else {
            $toast[] = ['error', 'Wrong verification code'];
        }

        return back()->withToasts($toast);
    }

    function donationHistory() {
        $pageTitle = 'My Donations';
        $deposits  = auth()->user()->deposits()
            ->with(['gateway', 'campaign'])
            ->searchable(['trx'])
            ->index()
            ->latest()
            ->paginate(getPaginate());

        return view($this->activeTheme . 'user.donation.sendLog', compact('pageTitle', 'deposits'));
    }

    function donationReceived() {
        $pageTitle = 'Received Donations';
        $campaigns = auth()->user()->campaigns()->pluck('id');
        $donations = Deposit::whereIn('campaign_id', $campaigns)
            ->with(['user', 'gateway', 'campaign'])
            ->done()
            ->latest()
            ->paginate(getPaginate());

        return view($this->activeTheme . 'user.donation.receivedLog', compact('pageTitle', 'donations'));
    }

    function transactions() {
        $pageTitle    = 'Transactions';
        $remarks      = Transaction::distinct('remark')->orderBy('remark')->get('remark');
        $transactions = Transaction::where('user_id', auth()->id())
            ->searchable(['trx'])
            ->filter(['remark'])
            ->orderBy('id', 'desc')
            ->paginate(getPaginate());

        return view($this->activeTheme . 'user.page.transactions', compact('pageTitle', 'transactions', 'remarks'));
    }

    function fileDownload() {
        $path = request('filePath');
        $file = fileManager()->$path()->path . '/' . request('fileName');

        return response()->download($file);
    }
}
