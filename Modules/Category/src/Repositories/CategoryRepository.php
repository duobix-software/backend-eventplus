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
        $query = $this->model->query();

        if (data_get($params, 'with-tags')) {
            $query = $this->with('tags');
        }

        return $query->simplePaginate($params['limit'] ?? 15);
    }
}
