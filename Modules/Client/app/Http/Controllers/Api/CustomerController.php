<?php

namespace Duobix\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Duobix\Client\Transformers\CustomerResource;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __invoke(Request $request)
    {
        /** @var \Duobix\Customer\Models\Customer */
        $customer = $request->user();

        if ($request->input('with-tags')) {
            $customer->load('tags');
        }

        return new CustomerResource($customer);
    }
}
