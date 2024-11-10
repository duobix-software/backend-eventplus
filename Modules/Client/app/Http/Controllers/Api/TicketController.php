<?php

namespace Duobix\Client\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Duobix\Sales\Repositories\OrderRepository;
use Duobix\Ticket\Repositories\TicketRepository;

class TicketController extends Controller
{

    public function __construct(
        protected OrderRepository $orderRepository,
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
            'id' => $accessTicket->ticket->id,
            'token' => url()->query('https://eventplus.duobix.com', ['token' => $accessTicket->publicToken]),
        ];
    }
}
