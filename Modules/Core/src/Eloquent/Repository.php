<?php

namespace Duobix\Core\Eloquent;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

abstract class Repository extends BaseRepository implements CacheableInterface
{
    use CacheableRepository;

    public function findByFieldOrFail($field, $value = null, $columns = ['*'])
    {
        $value = $this->findByField($field, $value, $columns);        

        if (!count($value)) return abort(404);

        return $value;
    }
}
