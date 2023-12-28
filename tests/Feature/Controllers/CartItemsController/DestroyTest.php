<?php

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;

it('requires authentication', function () {
    delete(route('cartitem.destroy', 1))->assertRedirect(route('login'));
});

it('remove the item from the cart when the qty is 1', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    actingAs($user)->post(route('cartitem.store', $product->id));
    actingAs($user)->delete(route('cartitem.destroy', $product->id));

    $this->assertDatabaseMissing(CartItem::class, [
        'product_id' => $product->id,
        'cart_id' => $user->cart->id
    ]);
});

it('decrease the qty when there is more than 1 item', function () {
    $user = User::factory()->create();
    $product = Product::factory()->create();

    actingAs($user)->post(route('cartitem.store', $product->id));
    actingAs($user)->post(route('cartitem.store', $product->id));
    actingAs($user)->delete(route('cartitem.destroy', $product->id));

    $this->assertDatabaseHas(CartItem::class, [
        'product_id' => $product->id,
        'cart_id' => $user->cart->id,
        'quantity' => 1
    ]);
});
