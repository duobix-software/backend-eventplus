<?php

namespace Duobix\Organisation\Models;

use Duobix\Category\Models\Category;
use Duobix\Event\Models\Event;
use Duobix\Organizer\Models\Organizer;
use Illuminate\Database\Eloquent\Model;
use Duobix\Core\Models\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Duobix\Organisation\Database\Factories\OrganisationFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organisation extends Model
{
    use HasFactory;

    public $translatedAttributes = ['name', 'slogan', 'description'];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'name',
        'slogan',
        'description',
        'status',
        'logo',
        'website',
        'is_suspended',
        'is_verified',
    ];

    protected static function newFactory(): OrganisationFactory
    {
        return OrganisationFactory::new();
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function organizers(): BelongsToMany
    {
        return $this->belongsToMany(Organizer::class, 'organisation_organizer');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
