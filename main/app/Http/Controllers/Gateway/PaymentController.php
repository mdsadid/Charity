<?php

namespace App\Http\Controllers\Gateway;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Campaign;
use App\Models\Donation;
use App\Lib\FormProcessor;
use App\Models\Transaction;
use App\Constants\ManageStatus;
use App\Models\GatewayCurrency;
use App\Models\AdminNotification;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    function depositInsert($slug) {
        $countryData = (array) json_decode(file_get_contents(resource_path('views/partials/country.json')));
        $countries   = implode(',', array_column($countryData, 'country'));

        $this->validate(request(), [
            'amount'    => 'required|numeric|gt:0',
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|max:40',
            'phone'     => 'required|max:40',
            'country'   => 'required|max:40|in:' . $countries,
            'gateway'   => 'required|exists:gateways,code',
            'currency'  => 'required',
        ]);

        $campaign = Campaign::where('slug', $slug)->campaignCheck()->approve()->firstOrFail();

        if (!$campaign) {
            $toast[] = ['error', 'Campaign not found'];

            return back()->withToasts($toast);
        }

        $gatewayData = GatewayCurrency::whereHas('method', function ($gateway) {
            $gateway->active();
        })
            ->where('method_code', request('gateway'))
            ->where('currency', request('currency'))
            ->first();

        if (!$gatewayData) {
            $toast[] = ['error', 'Invalid gateway'];

            return back()->withToasts($toast);
        }

        if ($gatewayData->min_amount > request('amount') || $gatewayData->max_amount < request('amount')) {
            $toast[] = ['error', 'Please follow donation limit'];

            return back()->withToasts($toast);
        }

        $charge       = $gatewayData->fixed_charge + (request('amount') * $gatewayData->percent_charge / 100);
        $payable      = request('amount') + $charge;
        $final_amount = $payable * $gatewayData->rate;

        // Save data in deposit table
        $deposit                  = new Deposit();
        $deposit->user_id         = auth()->check() ? auth()->id() : 0;
        $deposit->method_code     = $gatewayData->method_code;
        $deposit->method_currency = strtoupper($gatewayData->currency);
        $deposit->amount          = request('amount');
        $deposit->charge          = $charge;
        $deposit->rate            = $gatewayData->rate;
        $deposit->final_amo       = $final_amount;
        $deposit->btc_amo         = 0;
        $deposit->btc_wallet      = "";
        $deposit->trx             = getTrx();
        $deposit->save();

        if (auth()->check()) {
            $userFullName = auth()->user()->fullname;
            $userEmail    = auth()->user()->email;
            $userPhone    = auth()->user()->mobile;
            $userCountry  = auth()->user()->country_name;
        } else {
            $userFullName = request('full_name');
            $userEmail    = request('email');
            $userPhone    = request('phone');
            $userCountry  = request('country');
        }

        // Save data in donation table
        $donation              = new Donation();
        $donation->deposit_id  = $deposit->id;
        $donation->campaign_id = $campaign->id;
        $donation->type        = request('anonymousDonation') == 'on' ? Donation::ANONYMOUS_DONATION : Donation::KNOWN_DONATION;
        $donation->full_name   = $userFullName;
        $donation->email       = $userEmail;
        $donation->phone       = $userPhone;
        $donation->country     = $userCountry;
        $donation->save();

        session()->put('Track', $deposit->trx);

        return to_route('user.deposit.confirm');
    }

    function depositConfirm() {
        $track   = session()->get('Track');
        $deposit = Deposit::where('trx', $track)->initiate()->orderBy('id', 'DESC')->with('gateway')->firstOrFail();

        if ($deposit->method_code >= 1000) return to_route('user.deposit.manual.confirm');

        $dirName = $deposit->gateway->alias;
        $new     = __NAMESPACE__ . '\\' . $dirName . '\\ProcessController';
        $data    = $new::process($deposit);
        $data    = json_decode($data);

        if (isset($data->error)) {
            $toast[] = ['error', $data->message];

            return to_route(gatewayRedirectUrl())->withToasts($toast);
        }

        if (isset($data->redirect)) return redirect($data->redirect_url);

        // for Stripe V3
        if (@$data->session) {
            $deposit->btc_wallet = $data->session->id;
            $deposit->save();
        }

        $pageTitle = 'Donation Confirmation';

        return view($this->activeTheme . $data->view, compact('data', 'pageTitle', 'deposit'));
    }

    static function campaignDataUpdate($deposit, $isManual = null) {
        if ($deposit->status == ManageStatus::PAYMENT_INITIATE || $deposit->status == ManageStatus::PAYMENT_PENDING) {
            $deposit->status = ManageStatus::PAYMENT_SUCCESS;
            $deposit->save();

            $user = User::find($deposit->user_id);

            if (!$user) {
                $donationData = $deposit->donation;
                $user         = [
                    'fullname' => $donationData->full_name,
                    'username' => $donationData->email,
                    'email'    => $donationData->email,
                    'mobile'   => $donationData->phone,
                ];
            }

            $campaign                 = $deposit->donation->campaign;
            $campaign->raised_amount += $deposit->amount;
            $campaign->save();

            $campaignAuthor           = $campaign->user;
            $campaignAuthor->balance += $deposit->amount;
            $campaignAuthor->save();

            $transaction                        = new Transaction();
            $transaction->user_id               = $deposit->user_id;
            $transaction->amount                = $deposit->amount;
            $transaction->charge                = $deposit->charge;
            $transaction->post_balance          = $user->balance ?? 0;
            $transaction->campaign_id           = $campaign->id;
            $transaction->campaign_post_balance = $campaign->raised_amount;
            $transaction->trx_type              = '+';
            $transaction->details               = 'Donation Via ' . $deposit->gatewayCurrency()->name;
            $transaction->trx                   = $deposit->trx;
            $transaction->remark                = 'deposit';
            $transaction->save();

            if (!$isManual) {
                $adminNotification            = new AdminNotification();
                $adminNotification->user_id   = $deposit->user_id;
                $adminNotification->title     = 'Deposit successful via ' . $deposit->gatewayCurrency()->name . ' for a campaign';
                $adminNotification->click_url = urlPath('admin.donations.done');
                $adminNotification->save();
            }

            notify($user, $isManual ? 'DONATION_APPROVE' : 'DONATION_COMPLETE', [
                'method_name'     => $deposit->gatewayCurrency()->name,
                'method_currency' => $deposit->method_currency,
                'method_amount'   => showAmount($deposit->final_amo),
                'amount'          => showAmount($deposit->amount),
                'charge'          => showAmount($deposit->charge),
                'rate'            => showAmount($deposit->rate),
                'trx'             => $deposit->trx,
                'campaign_name'   => $campaign->name,
            ]);
        }
    }

    function manualDepositConfirm() {
        $track   = session()->get('Track');
        $deposit = Deposit::with('gateway')->initiate()->where('trx', $track)->first();

        if (!$deposit) return to_route(gatewayRedirectUrl());

        if ($deposit->method_code > 999) {
            $pageTitle       = 'Donation Confirmation';
            $gatewayCurrency = $deposit->gatewayCurrency();
            $gateway         = $gatewayCurrency->method;

            return view($this->activeTheme . 'user.payment.manual', compact('deposit', 'pageTitle', 'gateway'));
        }

        abort(404);
    }

    function manualDepositUpdate() {
        $track   = session()->get('Track');
        $deposit = Deposit::with('gateway')->initiate()->where('trx', $track)->first();

        if (!$deposit) return to_route(gatewayRedirectUrl());

        $gatewayCurrency = $deposit->gatewayCurrency();
        $gateway         = $gatewayCurrency->method;
        $formData        = $gateway->form->form_data;

        $formProcessor  = new FormProcessor();
        $validationRule = $formProcessor->valueValidation($formData);

        request()->validate($validationRule);
        $userData = $formProcessor->processFormData(request(), $formData);

        $deposit->detail = $userData;
        $deposit->status = ManageStatus::PAYMENT_PENDING;
        $deposit->save();

        $adminNotification            = new AdminNotification();
        $adminNotification->user_id   = $deposit->user->id ?? 0;
        $donor                        = $deposit->user->fullname ?? 'an anonymous user';
        $adminNotification->title     = "Deposit request from $donor for a campaign";
        $adminNotification->click_url = urlPath('admin.donations.pending');
        $adminNotification->save();

        if (!$deposit->user) {
            $donationData = $deposit->donation;
            $user         = [
                'fullname' => $donationData->full_name,
                'username' => $donationData->email,
                'email'    => $donationData->email,
                'mobile'   => $donationData->phone,
            ];
        } else {
            $user = $deposit->user;
        }

        notify($user, 'DONATION_REQUEST', [
            'method_name'     => $deposit->gatewayCurrency()->name,
            'method_currency' => $deposit->method_currency,
            'method_amount'   => showAmount($deposit->final_amo),
            'amount'          => showAmount($deposit->amount),
            'charge'          => showAmount($deposit->charge),
            'rate'            => showAmount($deposit->rate),
            'trx'             => $deposit->trx,
            'campaign_name'   => $deposit->donation->campaign->name,
        ]);

        $toast[] = ['success', 'Your donation request has been taken. Please wait for admin response'];

        return to_route('user.donation.history')->withToasts($toast);
    }
}
