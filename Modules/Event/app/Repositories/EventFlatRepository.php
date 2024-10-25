<?php

namespace Duobix\Event\Repositories;

use Duobix\Core\Eloquent\Repository;

class EventFlatRepository extends Repository
{
    public function model()
    {
        return \Duobix\Event\Models\EventFlat::class;
    }
}
