<?php

namespace Duobix\Payment;

class Payment
{
    /**
     * Returns all supported payment methods
     *
     * @return array
     */
    public function getSupportedPaymentMethods()
    {
        return $this->getPaymentMethods();
    }

    /**
     * Returns all supported payment methods
     *
     * @return array
     */
    public function getPaymentMethods()
    {
        $paymentMethods = [];

        foreach (config('payment.methods') as $paymentMethodConfig) {
            if ($paymentMethodConfig['active']) {
                $paymentMethods[] = [
                    'method'       => $paymentMethodConfig['code'],
                    'method_title' => $paymentMethodConfig['title'],
                    'description'  => $paymentMethodConfig['description'],
                ];
            }
        }

        return $paymentMethods;
    }

    /**
     * Returns payment redirect url if have any
     * @param Duobix\Payment\Models\Payment $payment
     * @return string
     */
    public function getRedirectUrl($payment)
    {
        $payment = app(config("payment.methods.{$payment->type}.class"));

        return $payment->getRedirectUrl($payment);
    }
}
