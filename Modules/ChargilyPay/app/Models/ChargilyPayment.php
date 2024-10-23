<?php

namespace Duobix\ChargilyPay\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Duobix\ChargilyPay\Database\Factories\ChargilyPaymentFactory;

class ChargilyPayment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ["user_id","status","currency","amount"];

    // protected static function newFactory(): ChargilyPaymentFactory
    // {
    //     // return ChargilyPaymentFactory::new();
    // }
}
