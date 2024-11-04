<?php

namespace Duobix\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Duobix\Client\Transformers\OrderResource;
use Duobix\Customer\Models\Customer;
use Duobix\Sales\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected Customer $customer;

    public function __construct(
        protected OrderRepository $orderRepository
    ) {
        $this->customer = request()->user();
    }

    public function index() {
        $orders = $this->customer->orders()->get();

        return OrderResource::collection($orders);
    }

    public function show(Request $request)
    {
        $order = $this->customer->orders()->where('id', $request->route('order'))->firstOrFail();

        return new OrderResource($order);
    }
}
