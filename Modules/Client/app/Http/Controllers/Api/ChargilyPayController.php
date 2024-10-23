<?php

namespace Duobix\Client\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Duobix\ChargilyPay\Repositories\ChargilyPayRepository;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ChargilyPayController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', only: ['redirect', 'back']),
        ];
    }


    public function __construct(
        protected ChargilyPayRepository $chargilyPayRepository
    ) {}

    public function redirect(Request $request)
    {
        // $request->validate([]);

        $checkout = DB::transaction(function () use ($request) {
            $payment =  $this->chargilyPayRepository->create([
                'user_id' => $request->user()->id,
                'status' => 'pending',
                'currency' => 'dzd',
                'amount' => '1000',
            ]);

            $checkout = $this->chargilyPayInstance()->checkouts();

            $checkout = $checkout->create([
                'metadata' => [
                    'payment_id' => $payment->id,
                ],
                'locale' => 'fr',
                'amount' => $payment->amount,
                'currency' => $payment->currency,
                'description' => "Payment ID={$payment->id}",
                "success_url" => route('api.chargilypay.back'),
                "failure_url" => route('api.chargilypay.back'),
                "webhook_endpoint" => route('api.chargilypay.webhook'),

            ]);

            return $checkout;
        });

        return redirect($checkout->getUrl());
    }

    public function back(Request $request)
    {
        $checkout = $this->chargilyPayInstance()->checkouts()->get($request->input('checkout_id'));
        $metadata = $checkout->getMetadata();
        $payment = $this->chargilyPayRepository->find($metadata['payment_id']);
        dd($checkout, $payment);
    }

    public function webhook() {}


    /**
     * Just a shortcut
     */
    protected function chargilyPayInstance()
    {
        return new \Chargily\ChargilyPay\ChargilyPay(new \Chargily\ChargilyPay\Auth\Credentials([
            "mode" => "test",
            "public" => config('chargilypay.public_key'),
            "secret" => config('chargilypay.secret_key'),
        ]));
    }
}
