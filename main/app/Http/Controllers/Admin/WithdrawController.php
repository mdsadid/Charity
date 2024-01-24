<?php

namespace App\Http\Controllers\Admin;

use App\Constants\ManageStatus;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Withdrawal;

class WithdrawController extends Controller
{
    function index() {
        $pageTitle      = 'All Withdrawals';
        $withdrawalData = $this->withdrawalData('index', true);
        $withdrawals    = $withdrawalData['data'];
        $summery        = $withdrawalData['summery'];
        $done           = $summery['done'];
        $pending        = $summery['pending'];
        $canceled       = $summery['canceled'];

        return view('admin.withdraw.index', compact('pageTitle', 'withdrawals', 'done', 'pending', 'canceled'));
    }

    function pending() {
        $pageTitle   = 'Pending Withdrawals';
        $withdrawals = $this->withdrawalData('pending');

        return view('admin.withdraw.index', compact('pageTitle', 'withdrawals'));
    }

    function done() {
        $pageTitle   = 'Done Withdrawals';
        $withdrawals = $this->withdrawalData('done');

        return view('admin.withdraw.index', compact('pageTitle', 'withdrawals'));
    }

    function canceled() {
        $pageTitle   = 'Canceled Withdrawals';
        $withdrawals = $this->withdrawalData('canceled');

        return view('admin.withdraw.index', compact('pageTitle', 'withdrawals'));
    }

    function approve() {
        $this->validate(request(), ['id' => 'required|int|gt:0']);
        $withdraw                 = Withdrawal::where('id', request('id'))->pending()->with('user')->firstOrFail();
        $withdraw->status         = ManageStatus::PAYMENT_SUCCESS;
        $withdraw->admin_feedback = request('admin_feedback');
        $withdraw->save();

        notify($withdraw->user, 'WITHDRAW_APPROVE', [
            'method_name'     => $withdraw->method->name,
            'method_currency' => $withdraw->currency,
            'method_amount'   => showAmount($withdraw->final_amount),
            'amount'          => showAmount($withdraw->amount),
            'charge'          => showAmount($withdraw->charge),
            'rate'            => showAmount($withdraw->rate),
            'trx'             => $withdraw->trx,
            'admin_details'   => request('admin_feedback')
        ]);

        $toast[] = ['success', 'Withdrawal approval success'];
        return back()->withToasts($toast);
    }

    function cancel() {
        $this->validate(request(), [
            'id' => 'required|int|gt:0',
            'admin_feedback' => 'required|max:255',
        ]);
        
        $withdraw                 = Withdrawal::where('id', request('id'))->pending()->with('user')->firstOrFail();
        $withdraw->status         = ManageStatus::PAYMENT_CANCEL;
        $withdraw->admin_feedback = request('admin_feedback');
        $withdraw->save();

        $user = $withdraw->user;
        $user->balance += $withdraw->amount;
        $user->save();

        $transaction               = new Transaction();
        $transaction->user_id      = $withdraw->user_id;
        $transaction->amount       = $withdraw->amount;
        $transaction->post_balance = $user->balance;
        $transaction->charge       = 0;
        $transaction->trx_type     = '+';
        $transaction->details      = showAmount($withdraw->amount) . ' ' . bs('cur_text') . ' Refunded from withdrawal cancellation';
        $transaction->trx          = $withdraw->trx;
        $transaction->remark       = 'withdraw_reject';
        $transaction->save();

        notify($user, 'WITHDRAW_REJECT', [
            'method_name'     => $withdraw->method->name,
            'method_currency' => $withdraw->currency,
            'method_amount'   => showAmount($withdraw->final_amount),
            'amount'          => showAmount($withdraw->amount),
            'charge'          => showAmount($withdraw->charge),
            'rate'            => showAmount($withdraw->rate),
            'trx'             => $withdraw->trx,
            'post_balance'    => showAmount($user->balance),
            'admin_details'   => request('admin_feedback')
        ]);

        $toast[] = ['success', 'Withdrawal cancellation success'];
        return back()->withToasts($toast);
    }

    protected function withdrawalData($scope = null, $summery = false) {
        if ($scope) {
            $withdrawals = Withdrawal::$scope()->with(['user','method']);
        }else{
            $withdrawals = Withdrawal::index()->with(['user','method']);
        }

        $withdrawals = $withdrawals->searchable(['trx', 'user:username'])->dateFilter();
        
        // By Payment Method
        if (request('method')) {
            $withdrawals = $withdrawals->where('method_id', request('method'));
        }

        if (!$summery) {
            return $withdrawals-> latest()->paginate(getPaginate());
        }else{
            $doneSummery     = (clone $withdrawals)->done()->sum('amount');
            $pendingSummery  = (clone $withdrawals)->pending()->sum('amount');
            $canceledSummery = (clone $withdrawals)->canceled()->sum('amount');

            return [
                'data' => $withdrawals->latest()->paginate(getPaginate()),
                'summery' => [
                    'done'     => $doneSummery,
                    'pending'  => $pendingSummery,
                    'canceled' => $canceledSummery
                ]
            ];
        }
    }
}
