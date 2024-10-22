<?php

namespace Duobix\Event\Repositories;

use Duobix\Core\Eloquent\Repository;

class EventRepository extends Repository
{
    public function model()
    {
        return \Duobix\Event\Models\Event::class;
    }
}
