<?php

use App\Models\User;

test('Guest user redirect to login', function () {
    $response = $this->get(route('dashboard'));

    $response->assertStatus(302);
    $response->assertRedirect(route('login'));
});

test('Dashboard is accessible', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertStatus(200);
});
