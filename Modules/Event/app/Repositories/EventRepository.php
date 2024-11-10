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
                case "tag":
                    $query->whereHas('category.tags', fn($query) => $query->where('name', 'like', '%' . $value . '%'));
                    break;
            }
        }

        return $query->simplePaginate($params['limit'] ?? 15);
    }

    // public function create(array $attributes)
    // {
    //     $model = $this->model->create($attributes);

    //     if ($model->status === "active") {
    //         IndexEvent::dispatchAfterResponse($model);
    //     }

    //     return $model;
    // }

    // public function findBySlug(string $slug, bool $active = true)
    // {
    //     return $this->findWhere([
    //         'slug' => $slug,
    //         'status' => $active,
    //     ])->first();
    // }

}
