<?php

// This class was generated on Wed, 01 Aug 2018 16:35:04 PDT by version 0.1.0-dev+0ee05a-dirty of Braintree SDK Generator
// AuthorizationsCaptureRequest.php
// @version 0.1.0-dev+0ee05a-dirty
// @type request
// @data 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
// DO NOT EDIT

namespace App\Http\Controllers\Gateway\PaypalSdk\Payments;

use App\Http\Controllers\Gateway\PaypalSdk\PayPalHttp\HttpRequest;

class AuthorizationsCaptureRequest extends HttpRequest
{
    function __construct($authorizationId)
    {
        parent::__construct("/v2/payments/authorizations/{authorization_id}/capture?", "POST");

        $this->path                    = str_replace("{authorization_id}", urlencode($authorizationId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    public function payPalRequestId($payPalRequestId)
    {
        $this->headers["PayPal-Request-Id"] = $payPalRequestId;
    }

    public function prefer($prefer)
    {
        $this->headers["Prefer"] = $prefer;
    }
}
