<?php

namespace Duobix\Client\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Chargily\ChargilyPay\ChargilyPay;
use Duobix\Payment\Repositories\PaymentRepository;
use Duobix\Sales\Enums\OrderStatus;

class PaymentController extends Controller
{
    public function __construct(
        protected ChargilyPay $chargilyPay,
        protected PaymentRepository $paymentRepository,
    ) {}

    public function success(Request $request)
    {
        $checkout = $this->chargilyPay->checkouts()->get($request->input('checkout_id'));
        $metadata = $checkout->getMetadata();

        /** @var \Duobix\Payment\Models\Payment */
        $payment = $this->paymentRepository->findByFieldOrFail('uuid', $metadata['payment_id'])->first();

        if ($payment->status !== 'pending') {
            abort(409, 'Payment has already been processed!');
        }

        DB::transaction(function () use ($payment) {
            $payment->update([
                'status' => 'paid',
            ]);

            event(new \Duobix\Client\Events\Order\OrderConfirmed($payment->order_id));
        });

        redirect()->away('eventplus://checkout/success');
    }

    public function failure(Request $request)
    {
        $checkout = $this->chargilyPay->checkouts()->get($request->input('checkout_id'));
        $metadata = $checkout->getMetadata();

        /** @var \Duobix\Payment\Models\Payment */
        $payment = $this->paymentRepository->findByFieldOrFail('uuid', $metadata['payment_id'])->first();

        if ($payment->status !== 'pending') {
            abort(409, 'Payment has already been processed!');
        }

        DB::transaction(function () use ($payment) {
            $payment->update([
                'status' => 'failed',
            ]);

            event(new \Duobix\Client\Events\Order\OrderFailed($payment->order_id));
        });

        redirect()->away('eventplus://checkout/failure');
    }

    public function webhook() {}
}
