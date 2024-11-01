<?php

namespace Duobix\Payment\Payment;

abstract class Payment
{
    /** 
     * @param \Duobix\Payment\Models\Payment
     */
    abstract public function getRedirectUrl($payment);
}
