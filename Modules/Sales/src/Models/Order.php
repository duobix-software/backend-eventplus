<?php

namespace Duobix\Sales\Models;

use Duobix\Sales\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

// use Duobix\Sales\Database\Factories\OrderFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'customer_id',
        'organisation_id',
        'event_id',
        'event_date_id',
        'event_pricing_id',
        'total',
        'status',
        'customer_first_name',
        'customer_last_name',
        'customer_phone',
        'customer_email',
        'event_title',
        'event_banner',
        'organisation_name',
    ];

    protected function casts()
    {
        return [
            'status' => OrderStatus::class
        ];
    }

    public function payment(): HasMany
    {
        return $this->hasMany(\Duobix\Payment\Models\Payment::class);
    }

    // protected static function newFactory(): OrderFactory
    // {
    //     // return OrderFactory::new();
    // }
}
