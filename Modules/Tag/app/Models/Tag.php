<?php

namespace Duobix\Tag\Models;

use Duobix\Category\Models\Category;
use Duobix\Customer\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Duobix\Tag\Database\Factories\TagFactory;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name'];

    public $timestamps = false;

    // protected static function newFactory(): TagFactory
    // {
    //     // return TagFactory::new();
    // }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
