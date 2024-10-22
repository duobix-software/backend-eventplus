<?php

namespace Duobix\Organizer\Models;

use Duobix\Organisation\Models\Organisation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use Duobix\Organizer\Database\Factories\OrganizerFactory;

class Organizer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'fullname',
        'date_of_birth',
        'gender',
        'image',
        'phone',
        'username',
        'email',
        'password',
        'status',
        'is_verified',
        'is_suspended',
        'is_customer',
    ];

    public function organisations(): BelongsToMany
    {
        return $this->belongsToMany(Organisation::class, 'organisation_organizer');
    }

    // protected static function newFactory(): OrganizerFactory
    // {
    //     // return OrganizerFactory::new();
    // }
}
