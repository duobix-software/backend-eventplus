<?php

namespace Duobix\Client\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Duobix\Event\Repositories\EventRepository;
use Duobix\Sales\Repositories\OrderRepository;
use Duobix\Ticket\Repositories\TicketRepository;

class TicketController extends Controller
{

    public function __construct(
        protected OrderRepository $orderRepository,
        protected EventRepository $eventRepository,
        protected TicketRepository $ticketRepository
    ) {}

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $event = $this->eventRepository->findByFieldOrFail('slug', $request->route('event'))->first();

        // check if the check_in event is enabled.
        if (false) {
            return [
                'token' => 'https://eventplus.duobix.com',
            ];
        }

        $accessTicket = $this->ticketRepository->createOrRefrsh(['order_id' => $request->route('order')]);

        return $accessTicket;
    }
}
