<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use Inertia\Inertia;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CartsController extends Controller
{
    public function show()
    {
        return Inertia::render('Cart/Show', [
            'cart' => CartResource::make(
                auth()->user()->cart()->with('items')->firstOrCreate()
            )
        ]);
    }

    public function checkout()
    {
        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'Pay us'
                        ],
                        'unit_amount' => auth()->user()->cart->total() * 100
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('cart.show')
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        auth()->user()->cart->toOrder();

        return Inertia::render('Cart/Thanks');
    }
}
