<?php

return [
    'name' => 'ChargilyPay',

    'mode' => env('CHARGILYPAY_MODE', 'live'),

    'public_key' => env('CHARGILYPAY_PUBLIC_KEY', 'xyz'),

    'secret_key' => env('CHARGILYPAY_SECRET_KEY', 'xyz'),
];
