<?php

namespace Duobix\Client\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Duobix\Customer\Repositories\CustomerRepository;
use Duobix\Client\Http\Requests\Api\Auth\LoginRequest;

class AuthenticateController extends Controller
{

    public function __construct(
        protected CustomerRepository $customerRepository
    ) {}

    public function store(LoginRequest $request)
    {
        $request->ensureIsNotRateLimited();

        $customer = $this->customerRepository->findByUsername($request->input('username'));

        if (! $customer || ! Hash::check($request->input('password'), $customer->password)) {
            RateLimiter::hit($request->throttleKey());

            throw ValidationException::withMessages([
                'username' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($request->throttleKey());

        return response()->json([
            'token' =>  $customer->createToken($request->input('device_name'))->plainTextToken
        ], 200);
    }

    public function destroy(Request $request)
    {
        $request->user()->tokens->each->delete();

        return response()->noContent();
    }
}
