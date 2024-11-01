<?php

return [
    'name' => 'chargily pay',

    'methods' => [
        'chargilypay'  => [
            'code'        => 'chargilypay',
            'title'       => 'Chargily Pay',
            'description' => 'Chargily Pay',
            'class'       => \Duobix\Payment\Payment\ChargilyPay::class,
            'active'      => true,
        ],

        'stripe'   => [
            'code'        => 'stripe',
            'title'       => 'Stripe',
            'description' => 'Stripe',
            'class'       => \Duobix\Payment\Payment\Stripe::class,
            'active'      => false,
        ],
    ]
];
