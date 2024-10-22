<?php

namespace Duobix\Core\Repositories;

use Duobix\Core\Eloquent\Repository;

class CountryStateRepository extends Repository
{
    public function model()
    {
        return \Duobix\Core\Models\CountryState::class;
    }
}
