<?php

use App\Models\Nation;
use App\Models\User;

test('that a user has nation', function () {
    $user = User::factory()->create();
    expect($user->nation)->toBeInstanceOf(Nation::class);
});
