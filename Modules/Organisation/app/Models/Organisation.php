<?php

namespace Duobix\Organisation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Duobix\Organisation\Database\Factories\OrganisationFactory;

class Organisation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): OrganisationFactory
    // {
    //     // return OrganisationFactory::new();
    // }
}
