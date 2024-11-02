<?php

namespace Duobix\Category\Repositories;

use Duobix\Category\Models\Category;
use Duobix\Core\Eloquent\Repository;

class CategoryRepository extends Repository
{
    public function model()
    {
        return Category::class;
    }

    public function getAll(array $params = [])
    {
        return $this->simplePaginate($params['limit'] ?? 15);
    }
}
