<?php

namespace Duobix\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PaymentController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', ['success', 'failure'])
        ];
    }

    public function success(Request $request)
    {
        
    }

    public function failure(Request $request)
    {

    }

    public function webhook()
    {

    }

}
