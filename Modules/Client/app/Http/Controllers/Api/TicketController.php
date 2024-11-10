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
        /** @var \Duobix\Sales\Models\Order */
        $order = $this->orderRepository->findByFieldOrFail('id', $request->route('order'))->first();        

        if (!$order->canIssueTicket()) return abort(403);

        $accessTicket = $this->ticketRepository->createOrRefrsh($order);

        return [
            'token' => $accessTicket->publicToken,
            'fallback_token' => 'xyz'
        ];
    }
}
