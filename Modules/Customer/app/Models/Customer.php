<?php

namespace Duobix\Customer\Models;

use Laravel\Sanctum\HasApiTokens;
use Duobix\Payment\Traits\HasPayments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    // protected static function newFactory(): CustomerFactory
    // {
    //     // return CustomerFactory::new();
    // }
}
