<?php

namespace Duobix\Ticket;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class NewAccessTicket implements Arrayable, Jsonable
{
    /**
     * The access token instance.
     *
     * @var \Duobix\Ticket\Models\Ticket
     */
    public $ticket;

    /**
     * The plain text version of the token.
     *
     * @var string
     */
    public $publicToken;

    /**
     * 
     * @param \Duobix\Ticket\Models\Ticket $ticket
     * @param string $publicToken
     * @return void
     */
    public function __construct(\Duobix\Ticket\Models\Ticket $ticket, string $publicToken)
    {
        $this->ticket = $ticket;
        $this->publicToken = $publicToken;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'ticket' => $this->ticket,
            'publicToken' => $this->publicToken,
        ];
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
