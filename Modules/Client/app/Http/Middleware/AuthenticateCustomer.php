<?php

namespace Duobix\Client\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateCustomer
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $guard = "customer")
    {
        if (! auth()->guard($guard)->check()) {
            if ($request->expectsJson()) {
                return abort(401);
            }

            // return redirect()->route('');
        } else {
            if (! auth()->guard($guard)->user()->status) {
                auth()->guard($guard)->logout();

                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => trans('shop::app.customers.login-form.not-activated'),
                    ], 401);
                }

                // session()->flash('warning', trans('shop::app.customers.login-form.not-activated'));

                // return redirect()->route('shop.customer.session.index');
            }
        }

        return $next($request);
    }
}
