<?php

namespace Duobix\Organisation\Models;

use Duobix\Core\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Duobix\Organisation\Database\Factories\OrganisationRequestFactory;

class OrganisationRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'locale',
        'fullname',
        'email',
        'phone',
        'organisation_logo',
        'organisation_name',
        'organisation_description',
        'organisation_website',
        'status',
        'organisation_id',
        'organizer_id',
    ];

    protected static function newFactory(): OrganisationRequestFactory
    {
        return OrganisationRequestFactory::new();
    }

    public function Address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
