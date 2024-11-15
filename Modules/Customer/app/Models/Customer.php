<?php

namespace Duobix\Customer\Models;

use Laravel\Sanctum\HasApiTokens;
use Duobix\Payment\Traits\HasPayments;
use Duobix\Sales\Models\Order;
use Duobix\Tag\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use Duobix\Customer\Database\Factories\CustomerFactory;

class Customer extends Model
{
    use HasFactory, Notifiable, HasApiTokens, HasPayments;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'fullname',
        'date_of_birth',
        'gender',
        'image',
        'phone',
        'email',
        'username',
        'password',
        'status',
        'is_verified',
        'is_suspended',
        'is_organizer',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected function casts()
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function isAdmin(): bool
    {
        return $this->is_organizer;
    }

}
