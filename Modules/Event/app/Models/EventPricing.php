<?php

namespace Duobix\Event\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Duobix\Event\Database\Factories\EventPricingFactory;

class EventPricing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['event_id', 'quota', 'price', 'name', 'description'];

    public $timestamps = false;

    // protected static function newFactory(): EventPricingFactory
    // {
    //     // return EventPricingFactory::new();
    // }
}
