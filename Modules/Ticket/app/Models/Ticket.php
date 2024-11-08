<?php

namespace Duobix\Ticket\Models;

use Duobix\Sales\Models\Order;
use Laravel\Sanctum\HasApiTokens;
use Duobix\Ticket\NewAccessTicket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Duobix\Ticket\Database\Factories\TicketFactory;

class Ticket extends Model
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['order_id', 'token'];

    protected $hidden = ['token'];

    // protected static function newFactory(): TicketFactory
    // {
    //     // return TicketFactory::new();
    // }


    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public static function createTicket(array $attributes)
    {
        $instance = new static($attributes);

        $token = $instance->generateToken();

        $ticket = parent::query()->create([
            'order_id'  => $attributes['order_id'],
            'token' => $token->secret,
        ]);

        return new NewAccessTicket($ticket, $ticket->id . '|' . $token->public);
    }

    public static function refreshTicket($ticket)
    {
        if (!($ticket instanceof self)) {
            $ticket = static::query()->where('id', $ticket)->firstOrFail();
        }

        $token = $ticket->generateToken();

        $ticket->update([
            'token' => $token->secret,
        ]);

        return new NewAccessTicket($ticket, $ticket->id . '|' . $token->public);
    }

    public function generateToken()
    {
        $plainTextToken = $this->generateTokenString();

        return (object) [
            'secret' => hash('sha256', $plainTextToken),
            'public' => $plainTextToken,
        ];
    }
}
