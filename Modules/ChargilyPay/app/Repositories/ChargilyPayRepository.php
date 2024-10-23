<?php

namespace Duobix\ChargilyPay\Repositories;

use Duobix\Core\Eloquent\Repository;

class ChargilyPayRepository extends Repository
{
    public function model()
    {
        return \Duobix\ChargilyPay\Models\ChargilyPayment::class;
    }
}
