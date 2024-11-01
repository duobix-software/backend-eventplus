<?php

namespace Duobix\Payment\Payment;

use Chargily\ChargilyPay\ChargilyPay as ChargilyPayClass;

class ChargilyPay extends Payment
{
    public function __construct(
        protected ChargilyPayClass $chargilyPayInstance
    ) {}

    public function getRedirectUrl($payment)
    {
        $checkout = $this->chargilyPayInstance->checkouts()->create([
            'metadata' => [
                'payment_id' => $payment->uuid,
            ],
            'locale' => $payment->locale,
            'amount' => $payment->amount,
            'currency' => $payment->currency,
            'description' => "Payment ID={$payment->uuid}",
            'success_url' => route('api.payment.success'),
            'failure_url' => route('api.payment.failure'),
            'webhook_endpoint' => route('api.payment.webhook'),
        ]);

        return $checkout->getUrl();
    }
}
