<?php

namespace Duobix\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

// use Duobix\Core\Database\Factories\AddressFactory;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'country',
        'state',
        'postcode',
        'city',
        'address',
        'latitude',
        'longitude',
    ];

    public $timestamps = false;

    // protected static function newFactory(): AddressFactory
    // {
    //     // return AddressFactory::new();
    // }
    
    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
