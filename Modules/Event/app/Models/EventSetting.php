<?php

namespace Duobix\Event\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Duobix\Event\Database\Factories\EventSettingFactory;

class EventSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EventSettingFactory
    // {
    //     // return EventSettingFactory::new();
    // }
}
