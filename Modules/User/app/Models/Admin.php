<?php

namespace Duobix\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Duobix\User\Database\Factories\AdminFactory;

class Admin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): AdminFactory
    // {
    //     // return AdminFactory::new();
    // }
}
