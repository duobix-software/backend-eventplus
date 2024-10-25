<?php

namespace Duobix\Event\Models;

use Duobix\Event\Enums\EventStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Duobix\Event\Database\Factories\EventFlatFactory;

class EventFlat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'event_id',
        'organisation_id',
        'category_id',
        'status',
        'slug',
        'title',
        'description',
        'banner',
        'max_participants',
        'dates',
        'pricings',
        'tags',
        'category',
        'organisation',
        'address',
    ];

    protected $table = "event_flat";

    public $timestamps = false;

    protected function casts()
    {
        return [
            'status'       => EventStatus::class,
            'dates'        => 'array',
            'pricings'     => 'array',
            'tags'         => 'array',
            'category'     => 'array',
            'organisation' => 'array',
            'address'      => 'array',
        ];
    }

    // protected static function newFactory(): EventFlatFactory
    // {
    //     // return EventFlatFactory::new();
    // }
}
