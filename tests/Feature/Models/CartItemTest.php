<?php

use App\Models\CartItem;
use App\Models\Product;

test('that a cart item has a product relation', function () {
    $cartItem = CartItem::factory()->create();
    expect($cartItem->product)->toBeInstanceOf(Product::class);
});