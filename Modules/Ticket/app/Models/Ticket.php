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

    public static function createTicket(string $orderId)
    {
        $instance = new static();

        $token = $instance->generateToken();

        $ticket = parent::query()->create([
            'order_id'  => $orderId,
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

    /**
     * Find the token instance matching the given token.
     *
     * @param  string  $token
     * @return static|null
     */
    public static function findTicket($token)
    {
        if (strpos($token, '|') === false) {
            return static::where('token', hash('sha256', $token))->first();
        }

        [$id, $token] = explode('|', $token, 2);

        if ($instance = static::find($id)) {
            return hash_equals($instance->token, hash('sha256', $token)) ? $instance : null;
        }
    }
}
