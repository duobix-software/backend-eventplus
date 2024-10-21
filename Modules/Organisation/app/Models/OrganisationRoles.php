<?php

namespace Duobix\Organisation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Duobix\Organisation\Database\Factories\OrganisationRolesFactory;

class OrganisationRoles extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): OrganisationRolesFactory
    // {
    //     // return OrganisationRolesFactory::new();
    // }
}
