<?php

use App\Models\Nation;
use App\Providers\RouteServiceProvider;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test',
        'surname' => 'User',
        'email' => 'test@example.com',
        'nation_id' => Nation::factory()->create()->id,
        'vat_number' => '11111111112',
        'fiscal_code' => 'CLNGMN99P15I777A',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
});
