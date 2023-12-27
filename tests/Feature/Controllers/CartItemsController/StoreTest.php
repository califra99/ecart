<?php

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

it('requires authentication', function () {
    post(route('cartitem.store', 1))->assertRedirect(route('login'));
});

it('creates a cart the first product is added', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    actingAs($user)->post(route('cartitem.store', $product->id));

    $this->assertDatabaseHas(Cart::class, [
        'user_id' => $user->id,
    ]);
});

it('stores a product in the cart', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    actingAs($user)->post(route('cartitem.store', $product->id));

    $this->assertDatabaseHas(CartItem::class, [
        'product_id' => $product->id,
        'cart_id' => $user->cart->id,
        'quantity' => 1
    ]);
});

it('update the qty if the product already exist', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    actingAs($user)->post(route('cartitem.store', $product->id));
    actingAs($user)->post(route('cartitem.store', $product->id));

    $this->assertDatabaseHas(CartItem::class, [
        'product_id' => $product->id,
        'cart_id' => $user->cart->id,
        'quantity' => 2
    ]);
});
