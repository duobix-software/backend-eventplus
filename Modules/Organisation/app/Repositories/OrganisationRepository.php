<?php

namespace Duobix\Organisation\Repositories;

use Duobix\Core\Eloquent\Repository;
use Duobix\Organisation\Models\Organisation;

class OrganisationRepository extends Repository
{
    public function model()
    {
        return Organisation::class;
    }

    /** 
     * @return Organisation
     */
    public function create(array $data)
    {
        return $this->model->query()->create([
            'slug' => $data['slug'] ?? $this->generateSlug(),
            ...$data
        ]);
    }

    public function generateSlug(): string
    {
        return '';
    }
}
