<?php

namespace Duobix\Event\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Duobix\Event\Database\Factories\EventDateFactory;

class EventDate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'event_id',
        'start_date',
        'end_date',
    ];

    public $timestamps = false;

    protected function casts()
    {
        return [
            'is_datetime' => 'boolean',
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ];
    }

    // protected static function newFactory(): EventFactory
    // {
    //     // return EventFactory::new();
    // }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
