<?php

namespace Duobix\Payment\Repositories;

use Duobix\Core\Eloquent\Repository;

class PaymentRepository extends Repository
{
    public function model()
    {
        return \Duobix\Payment\Models\Payment::class;
    }
}
