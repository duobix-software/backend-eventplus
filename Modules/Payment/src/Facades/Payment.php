<?php

namespace Duobix\Payment\Facades;

use Illuminate\Support\Facades\Facade;

/** 
 * @method static array getSupportedPaymentMethods()
 * @method static array getPaymentMethods()
 * @method static void getRedirectUrl()
*/
class Payment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'payment';
    }
}