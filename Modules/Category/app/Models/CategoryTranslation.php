<?php

namespace Duobix\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Duobix\Category\Database\Factories\CategoryTranslationFactory;

class CategoryTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): CategoryTranslationFactory
    // {
    //     // return CategoryTranslationFactory::new();
    // }
}
