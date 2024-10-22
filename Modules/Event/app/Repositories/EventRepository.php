<?php

namespace Duobix\Event\Repositories;

use Duobix\Core\Eloquent\Repository;

class EventRepository extends Repository
{

    public function model()
    {
        return \Duobix\Event\Models\Event::class;
    }

    public function getAll(array $params = [])
    {
        $query = $this->model->query();

        foreach ($params as $key => $value) {
            switch ($key) {
                case "status":
                    $query->whereIn('status', $params['status']);
                    break;
                case "organisation":
                    $query->whereHas('organisation', fn($query) => $query->where('slug', $value));
                    break;
            }
        }

        return $query->cursorPaginate($params['limit'] ?? 15);
    }
}
