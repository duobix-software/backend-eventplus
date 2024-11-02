<?php

namespace Duobix\Sales\Repositories;

use Duobix\Core\Eloquent\Repository;

class OrderRepository extends Repository
{
    public function model()
    {
        return \Duobix\Sales\Models\Order::class;
    }
}
