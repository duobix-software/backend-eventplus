<?php

namespace Duobix\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Duobix\Core\Database\Factories\CoreConfigFactory;

class CoreConfig extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): CoreConfigFactory
    // {
    //     // return CoreConfigFactory::new();
    // }
}
