<?php

namespace Duobix\User\Repositories;

use Duobix\Core\Eloquent\Repository;
use Duobix\Organizer\Models\Organizer;

class OrganizerRepository extends Repository
{
    public function model()
    {
        return Organizer::class;
    }

    /**
     * @return Organizer
     */
    public function create(array $data)
    {
        return $this->model->query()->create($data);
    }
}
