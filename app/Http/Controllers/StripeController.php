<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function checkout(Invoice $invoice)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'lkr',
                    'product_data' => [
                        'name' => $invoice->title,
                        'description' => $invoice->description,
                    ],
                    'unit_amount' => $invoice->amount * 100, 
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['invoice' => $invoice->id]),
            'cancel_url' => route('invoices.show', ['invoice' => $invoice->id]),
            'metadata' => [
                'invoice_id' => $invoice->id,
            ],
        ]);

        return redirect($session->url);
    }

    public function success(Invoice $invoice)
    {
        // Update invoice status
        $invoice->update([
            'status' => 'paid',
            'paid_at' => now(),
        ]);

        return view('success', compact('invoice'));
    }
}
