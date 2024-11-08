<?php

namespace Duobix\Client\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Duobix\Event\Repositories\EventFlatRepository;
use Duobix\Event\Repositories\EventRepository;
use Duobix\Payment\Facades\Payment;
use Duobix\Sales\Enums\OrderStatus;
use Duobix\Sales\Repositories\OrderRepository;

class CheckoutController extends Controller
{
    public function __construct(
        protected EventRepository $eventRepository,
        protected EventFlatRepository $eventFlatRepository,
        protected OrderRepository $orderRepository,
    ) {}

    public function __invoke(Request $request)
    {
        $request->validate([
            'event' => ['required', 'string'],
            'pricing' => ['nullable'],
            'date' => ['nullable'],
            'variant_id' => ['nullable'],
        ]);

        /** @var \Duobix\Customer\Models\Customer */
        $customer = $request->user();

        /** @var \Duobix\Event\Models\Event */
        $event = $this->eventRepository->findByFieldOrFail('slug', $request->input('event'))->first();

        $pricing = $event->eventPricings->first();
        if ($request->input('pricing')) {
            $pricing = $event->eventPricings->where('id', $request->input('pricing'))->first();
        }

        $date = $event->eventDates->first();
        if ($request->input('date')) {
            $date = $event->eventDates->where('id', $request->input('date'))->first();
        }

        $variant = $event->eventVariants()
            ->where('event_id', $event->id)
            ->where('event_date_id', $date->id)
            ->where('event_pricing_id', $pricing->id)
            ->firstOrFail();

        $url = DB::transaction(function () use ($request, $event, $customer, $pricing, $date, $variant) {
            $order = $this->orderRepository->create([
                'customer_id' => $customer->id,
                'organisation_id' => $event->organisation_id,
                'event_id' => $event->id,
                'event_date_id' => $date->id,
                'event_pricing_id' => $pricing->id,
                'event_variant_id' => $variant->id,
                'total' => $pricing->price,
                'status' => OrderStatus::Pending,
                'variant_name' => $variant->name,
                'event_title' => $event->title,
            ]);

            $payment = $customer->payments()->create([
                'order_id' => $order->id,
                'status' => 'pending',
                'currency' => 'dzd',
                'amount' => $order->total,
                'locale' => 'en',
                'type' => 'chargilypay',
            ]);

            return Payment::getRedirectUrl($payment);
        });

        return response()->json([
            'redirect' => true,
            'redirect_url' => $url,
        ], 201);
    }
}
