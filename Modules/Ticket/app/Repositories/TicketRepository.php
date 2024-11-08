<?php

namespace Duobix\Ticket\Repositories;

use Duobix\Core\Eloquent\Repository;
use Duobix\Sales\Repositories\OrderRepository;

class TicketRepository extends Repository
{
    public function model()
    {
        return \Duobix\Ticket\Models\Ticket::class;
    }

    /** 
     * @return \Duobix\Ticket\NewAccessTicket
     */
    public function createOrRefrsh(array $attributes)
    {
        $order = app(OrderRepository::class)->findByFieldOrFail('id', $attributes['order_id'])->first();

        if ($order->ticket) {
            return \Duobix\Ticket\Models\Ticket::refreshTicket($attributes);
        }

        return \Duobix\Ticket\Models\Ticket::createTicket($order->ticket);
    }
}
