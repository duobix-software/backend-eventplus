<?php

namespace Duobix\Client\Listeners;

use Duobix\Sales\Models\Order;
use Illuminate\Events\Dispatcher;
use Duobix\Sales\Enums\OrderStatus;
use Duobix\Client\Events\Order\OrderFailed;
use Duobix\Client\Events\Order\OrderConfirmed;

class OrderEventSubscriber
{
    /**
     * Create the event listener.
     */
    public function __construct() {}

    public function handleOrderConfirm(OrderConfirmed $event)
    {
        $order = Order::query()->where('id', $event->orderId)->first();
        $order->update([
            'status' => OrderStatus::Confirmed,
        ]);

        $order->eventVariant->decrement('remaining_qte', 1);
    }

    public function handleOrderFail(OrderFailed $event)
    {
        $order = Order::query()->where('id', $event->orderId)->first();
        $order->update([
            'status' => OrderStatus::Failed,
        ]);
    }

    /**
     * Handle the event.
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            OrderConfirmed::class => 'handleOrderConfirm',
            OrderFailed::class => 'handleOrderFail',
        ];
    }
}
