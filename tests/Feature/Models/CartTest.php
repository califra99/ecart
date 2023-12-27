<?php

use App\Models\Cart;
use Illuminate\Database\Eloquent\Collection;

test('that a cart has a items relation', function () {
    $cart = Cart::factory()->create();
    expect($cart->items)->toBeInstanceOf(Collection::class);
});