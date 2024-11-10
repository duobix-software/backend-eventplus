<?php

namespace Duobix\Client\Http\Controllers;

use App\Http\Controllers\Controller;
use Duobix\Customer\Models\Customer;
use Illuminate\Http\Request;

class CustomerTagController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tags' => ['required', 'array'],
        ]);

        $request->user()->tags()->sync(array_unique($request->input('tags')));

        return response(status: 201);
    }
}
