<?php

namespace Duobix\Core\Repositories;

use Duobix\Core\Eloquent\Repository;

class CountryRepository extends Repository
{
    public function model()
    {
        return \Duobix\Core\Models\Country::class;   
    }
}
