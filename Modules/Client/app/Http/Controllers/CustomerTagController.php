<?php

namespace Duobix\Client\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerTagController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tags' => ['required', 'array'],
        ]);

        $request->user()->tags()->attach($request->input('tags'));

        return response(status: 201);
    }
}
