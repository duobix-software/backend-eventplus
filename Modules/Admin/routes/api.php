<?php

use Duobix\Client\Transformers\CustomerResource;
use Duobix\Client\Transformers\EventVariantResource;
use Duobix\Ticket\Models\Ticket;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::prefix('admin/v1')->as('admin.')->group(function () {
    Route::post('check/access-ticket', function (Request $request) {
        $request->validate([
            'token' => ['required', 'string'],
        ]);

        $ticket = Ticket::findTicket($request->input('token'));

        if (!$ticket) return abort(404, 'Token not valid');

        return [
            'order' => $ticket->order->id,
            'variant' => new EventVariantResource($ticket->order->eventVariant),
            'customer' => new CustomerResource($ticket->order->customer),
        ];
    })->name('check.access-ticket');
});
