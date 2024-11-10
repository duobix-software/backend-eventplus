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
    public function createOrRefrsh($order)
    {
        if (!is_a($order, $this->model())) {
            $order = app(OrderRepository::class)->findByFieldOrFail('id', $order)->first();
        }

        if ($order->ticket) {
            return \Duobix\Ticket\Models\Ticket::refreshTicket($order->ticket);
        }

        return \Duobix\Ticket\Models\Ticket::createTicket($order->id);
    }
}
