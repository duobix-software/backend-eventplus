<?php

namespace Duobix\Tag\Repositories;

use Duobix\Core\Eloquent\Repository;

class TagRepository extends Repository
{
    public function model()
    {
        return \Duobix\Tag\Models\Tag::class;
    }
}

