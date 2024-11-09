<?php

namespace Duobix\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Duobix\Client\Transformers\OrderResource;
use Duobix\Customer\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected Customer $customer;

    public function __construct()
    {
        $this->customer = request()->user();
    }

    public function index(Request $request)
    {
        $baseQuery = $this->customer->orders()->with('event');

        if ($request->input('status')) {
            $baseQuery->where('status', $request->input('status'));
        }

        $orders = $baseQuery->latest()->simplePaginate();
        return OrderResource::collection($orders);
    }

    public function show(Request $request)
    {
        $order = $this->customer->orders()->with('event')->where('id', $request->route('order'))->firstOrFail();

        return new OrderResource($order);
    }
}
