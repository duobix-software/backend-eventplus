<?php

namespace Duobix\Event\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Duobix\Event\Database\Factories\EventVariantFactory;

class EventVariant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'event_id',
        'event_pricing_id',
        'event_date_id',
        'name',
        'total_qte',
        'remaining_qte',
    ];

    public $timestamps = false;

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function eventDate(): BelongsTo
    {
        return $this->belongsTo(EventDate::class);
    }

    public function eventPricing(): BelongsTo
    {
        return $this->belongsTo(EventPricing::class);
    }

    // protected static function newFactory(): EventVariantFactory
    // {
    //     // return EventVariantFactory::new();
    // }
}
