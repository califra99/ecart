<?php

use App\Models\Cart;
use App\Models\Nation;
use App\Models\User;

test('that a user has a nation relation', function () {
    $user = User::factory()->create();
    expect($user->nation)->toBeInstanceOf(Nation::class);
});

test('that a user has a cart relation', function () {
    $user = User::factory()->create();
    Cart::factory()->create(['user_id' => $user->id]);

    expect($user->cart)->toBeInstanceOf(Cart::class);
});


