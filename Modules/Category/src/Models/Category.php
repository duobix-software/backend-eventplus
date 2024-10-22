<?php

namespace Duobix\Category\Models;

use Duobix\Tag\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use Duobix\Category\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'name', 
        'description',
        'logo',
        'banner',
        'status',
        'parent_id',
    ];

    public $timestamps = false;

    // protected static function newFactory(): CategoryFactory
    // {
    //     // return CategoryFactory::new();
    // }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
