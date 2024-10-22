<?php

namespace Duobix\Event\Models;

use Duobix\Core\Models\Address;
use Duobix\Organisation\Models\Organisation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

// use Duobix\Event\Database\Factories\EventFactory;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'title',
        'description',
        'banner',
        'organisation_id',
        'category_id',
        'status',
        'max_participants',
    ];

    // protected static function newFactory(): EventFactory
    // {
    //     // return EventFactory::new();
    // }

    public function organisation(): BelongsTo
    {
        return $this->belongsTo(Organisation::class);
    }

    public function eventDates(): HasMany
    {
        return $this->hasMany(EventDate::class);
    }

    public function eventPricings(): HasMany
    {
        return $this->hasMany(EventPricing::class);
    }

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}
