<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Gateway;
use App\Constants\ManageStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Gateway\PaymentController;

class DepositController extends Controller
{
    function index() {
        $pageTitle   = 'All Donations';
        $depositData = $this->donationData(null, true);
        $deposits    = $depositData['data'];
        $summary     = $depositData['summary'];
        $done        = $summary['done'];
        $pending     = $summary['pending'];
        $cancelled   = $summary['cancelled'];

        return view('admin.page.donations', compact('pageTitle', 'deposits', 'done', 'pending', 'cancelled'));
    }

    function pending() {
        $pageTitle = 'Pending Donations';
        $deposits  = $this->donationData('pending');

        return view('admin.page.donations', compact('pageTitle', 'deposits'));
    }

    function done() {
        $pageTitle = 'Done Donations';
        $deposits  = $this->donationData('done');

        return view('admin.page.donations', compact('pageTitle', 'deposits'));
    }

    function cancelled() {
        $pageTitle = 'Cancelled Donations';
        $deposits  = $this->donationData('cancelled');

        return view('admin.page.donations', compact('pageTitle', 'deposits'));
    }

    protected function donationData($scope = null, $summary = false) {
        if ($scope) {
            $deposits = Deposit::with(['gateway', 'campaign'])->$scope();
        } else {
            $deposits = Deposit::with(['gateway', 'campaign']);
        }

        $deposits = $deposits->searchable(['trx', 'user:username'])->dateFilter();

        // Filter By Payment Method
        if (request('method')) {
            $method   = Gateway::where('alias', request('method'))->firstOrFail();
            $deposits = $deposits->where('method_code', $method->code);
        }

        if (!$summary) {
            return $deposits->latest()->paginate(getPaginate());
        } else {
            $doneSummary      = (clone $deposits)->done()->sum('amount');
            $pendingSummary   = (clone $deposits)->pending()->sum('amount');
            $cancelledSummary = (clone $deposits)->cancelled()->sum('amount');

            return [
                'data'    => $deposits->latest()->paginate(getPaginate()),
                'summary' => [
                    'done'      => $doneSummary,
                    'pending'   => $pendingSummary,
                    'cancelled' => $cancelledSummary,
                ]
            ];
        }
    }

    function approve($id) {
        $deposit = Deposit::where('id', $id)->pending()->firstOrFail();
        PaymentController::campaignDataUpdate($deposit, true);

        $toast[] = ['success', 'Donation approval success'];

        return back()->withToasts($toast);
    }

    function reject($id) {
        $this->validate(request(), [
            'admin_feedback' => 'required|max:255',
        ]);

        $deposit                 = Deposit::where('id', $id)->pending()->with('user')->firstOrFail();
        $deposit->status         = ManageStatus::PAYMENT_CANCEL;
        $deposit->admin_feedback = request('admin_feedback');
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

        $campaign = $deposit->donation->campaign;

        notify($deposit->user, 'DONATION_REJECT', [
            'method_name'       => $deposit->gatewayCurrency()->name,
            'method_currency'   => $deposit->method_currency,
            'method_amount'     => showAmount($deposit->final_amo),
            'amount'            => showAmount($deposit->amount),
            'charge'            => showAmount($deposit->charge),
            'rate'              => showAmount($deposit->rate),
            'trx'               => $deposit->trx,
            'campaign_name'     => $campaign->name,
            'rejection_message' => request('admin_feedback'),
        ]);

        $toast[] = ['success', 'Donation rejection success'];

        return back()->withToasts($toast);
    }
}
