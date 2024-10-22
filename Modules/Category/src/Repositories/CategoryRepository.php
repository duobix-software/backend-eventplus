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
        return $this->model->query()->cursorPaginate($params['limit'] ?? 15);
    }

    public function getTags($categoryId)
    {
        // return $this->find()        
    }
}
