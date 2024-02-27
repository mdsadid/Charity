<?php

namespace App\Http\Controllers\Gateway\StripeJs;

use App\Constants\ManageStatus;
use App\Models\Deposit;
use App\Http\Controllers\Gateway\PaymentController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class ProcessController extends Controller
{
    public static function process($deposit)
    {
        $stripeJSAcc        = json_decode($deposit->gatewayCurrency()->gateway_parameter);
        $val['key']         = $stripeJSAcc->publishable_key;
        $val['name']        = $deposit->user->fullname ?? $deposit->donation->name;
        $val['description'] = "Payment with Stripe";
        $val['amount']      = round($deposit->final_amo, 2) * 100;
        $val['currency']    = $deposit->method_currency;
        $send['val']        = $val;
        $alias              = $deposit->gateway->alias;

        $send['src']    = "https://checkout.stripe.com/checkout.js";
        $send['view']   = 'user.payment.' . $alias;
        $send['method'] = 'post';
        $send['url']    = route('ipn.' . $deposit->gateway->alias);

        return json_encode($send);
    }

    public function ipn(Request $request)
    {
        $track   = session()->get('Track');
        $deposit = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();

        if ($deposit->status == ManageStatus::PAYMENT_SUCCESS) {
            $toast[] = ['error', 'Invalid request.'];

            return to_route(gatewayRedirectUrl())->withToasts($toast);
        }

        $stripeJSAcc = json_decode($deposit->gatewayCurrency()->gateway_parameter);

        Stripe::setApiKey($stripeJSAcc->secret_key);
        Stripe::setApiVersion("2020-03-02");

        try {
            $customer = Customer::create([
                'email'  => $request->stripeEmail,
                'source' => $request->stripeToken,
            ]);
        } catch (\Exception $e) {
            $toast[] = ['error', $e->getMessage()];

            return to_route(gatewayRedirectUrl())->withToasts($toast);
        }

        try {
            $charge = Charge::create([
                'customer'    => $customer->id,
                'description' => 'Payment with Stripe',
                'amount'      => round($deposit->final_amo, 2) * 100,
                'currency'    => $deposit->method_currency,
            ]);
        } catch (\Exception $e) {
            $toast[] = ['error', $e->getMessage()];

            return to_route(gatewayRedirectUrl())->withToasts($toast);
        }

        if ($charge['status'] == 'succeeded') {
            PaymentController::campaignDataUpdate($deposit);
            $toast[] = ['success', 'Payment completed successfully'];

            return to_route(gatewayRedirectUrl(true))->withToasts($toast);
        } else {
            $toast[] = ['error', 'Failed to process'];

            return to_route(gatewayRedirectUrl())->withToasts($toast);
        }
    }
}
