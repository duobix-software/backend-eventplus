<?php

namespace Duobix\Organizer\Repositories;

use Duobix\Core\Eloquent\Repository;
use Duobix\Organizer\Models\Organizer;

class OrganizerRepository extends Repository
{
    public function model() {
        return Organizer::class;
    }
}
