<?php

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

test('that a product has coupons', function () {
    $product = Product::factory()->create();
    expect($product->coupons)->toBeInstanceOf(Collection::class);
});