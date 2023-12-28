<?php

use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

beforeEach(function () {
    $this->product = Product::factory()->create();
    $this->coupon = Coupon::factory()->create();
    $this->user = User::factory()->create();

    actingAs($this->user)->post(route('cartitem.store', $this->product->id));
});

it('requires authentication', function () {
    post(route('coupons.apply', 1))->assertRedirect(route('login'));
});


it('requires valid data', function (array $badData) {
    actingAs($this->user)
        ->post(route('coupons.apply', $this->product->id), $badData)
        ->assertInvalid('code');
})->with([
    [['code' => '']],
    [['code' => 'codeThatNotExist']]
]);

it('requires valid coupon for the specific product', function () {
    actingAs($this->user)
        ->post(route('coupons.apply', $this->product->id), ['code' => $this->coupon->code])
        ->assertInvalid('code');
});

it('requires active coupon', function () {
    $couponDisabled = Coupon::factory()->create([
        'min_price' => 0,
        'max_price' => 1000,
        'active' => 0
    ]);

    $this->product->coupons()->attach($couponDisabled);

    actingAs($this->user)
        ->post(route('coupons.apply', $this->product->id), ['code' => $couponDisabled->code])
        ->assertInvalid('code');
});

it('requires that the cart total respects the coupon limits', function () {
    $couponExtraLimit = Coupon::factory()->create([
        'min_price' => 0,
        'max_price' => 0,
        'active' => 1
    ]);

    $this->product->coupons()->attach($couponExtraLimit);

    actingAs($this->user)
        ->post(route('coupons.apply', $this->product->id), ['code' => $couponExtraLimit->code])
        ->assertInvalid('code');
});


it('apply a valid coupon', function () {
    $this->product->coupons()->attach($this->coupon);

    actingAs($this->user)->post(route('coupons.apply', $this->product->id), ['code' => $this->coupon->code]);

    $this->assertDatabaseHas(CartItem::class, [
        'product_id' => $this->product->id,
        'coupon_id' => $this->coupon->id,
        'cart_id' => $this->user->cart->id
    ]);
});
