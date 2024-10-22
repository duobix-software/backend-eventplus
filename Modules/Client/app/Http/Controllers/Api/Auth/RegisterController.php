<?php

namespace Duobix\Client\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Duobix\Core\Rules\PhoneNumber;
use Duobix\Core\Rules\WordCount;
use Illuminate\Validation\Rules\Password;
use Duobix\Customer\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(
        protected CustomerRepository $customerRepository
    ) {}


    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'min:2', new WordCount(2, 4)],
            'email' => ['required', 'email:rfc,dns', 'max:128', 'unique:customers,email'],
            'phone' => ['required', 'unique:customers,phone', new PhoneNumber],
            'password' => ['required', Password::defaults()],
            'device_name' => ['required', 'string'],
        ]);

        $customer = $this->customerRepository->create([
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => bcrypt($request->input('password')),
        ]);

        return response()->json([
            'token' => $customer->createToken($request->input('device_name'))->plainTextToken
        ], 201);
    }
}
