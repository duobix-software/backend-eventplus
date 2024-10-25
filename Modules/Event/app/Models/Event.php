<?php

namespace Duobix\Event\Models;

use Duobix\Category\Models\Category;
use Duobix\Core\Models\Address;
use Duobix\Event\Enums\EventStatus;
use Duobix\Event\Observers\EventObserver;
use Duobix\Organisation\Models\Organisation;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Laravel\Scout\Searchable;
// use Duobix\Event\Database\Factories\EventFactory;

#[ObservedBy([EventObserver::class])]
class Event extends Model
{
    use HasFactory, Searchable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'title',
        'description',
        'status',
        'banner',
        'organisation_id',
        'max_participants',
    ];

    protected function casts()
    {
        return [
            'status' => EventStatus::class
        ];
    }

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['eventDates', 'eventPricings', 'address'];

    // protected static function newFactory(): EventFactory
    // {
    //     // return EventFactory::new();
    // }

    /**
     * Determine if the model should be searchable.
     */
    public function shouldBeSearchable(): bool
    {
        return $this->status === EventStatus::Active;
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray()
    {
        $flat = $this->flat;

        return [
            'id'           => (string) $this->id,
            'slug'         => $this->slug,
            'title'        => $this->title,
            'description'  => $this->description,
            'organisation' => $flat->organisation['name'],
            'country'      => $flat->address['country'],
            'state'        => $flat->address['state'],
            'city'         => $flat->address['city'],
            'address'      => $flat->address['address'],
            'location'     => isset($flat->address['latitude'], $flat->address['longitude']) ? [$flat->address['latitude'], $flat->address['longitude']] : null,
            'category'     => $flat->category['name'],
            'tags'         => $flat->tags,
            'created_at'   => $this->created_at->timestamp,
        ];
    }

    public function organisation(): BelongsTo
    {
        return $this->belongsTo(Organisation::class);
    }

    public function category(): HasOneThrough
    {
        return $this->hasOneThrough(Category::class, Organisation::class, 'id', 'id', 'organisation_id', 'category_id');
    }

    public function tags()
    {
        return $this?->category?->tags;
    }

    public function flat(): HasOne
    {
        return $this->hasOne(EventFlat::class);
    }

    public function eventDates(): HasMany
    {
        return $this->hasMany(EventDate::class);
    }

    public function eventPricings(): HasMany
    {
        return $this->hasMany(EventPricing::class);
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
