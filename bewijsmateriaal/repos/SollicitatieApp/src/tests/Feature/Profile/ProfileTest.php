<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('loads the page', function () {
    $this->actingAs($this->user)
        ->get(route('profile'))
        ->assertOk();
});

it('shows the user name', function () {
    $this->actingAs($this->user)
        ->get(route('profile'))
        ->assertSee($this->user->name);
});

it('shows the user email', function () {
    $this->actingAs($this->user)
        ->get(route('profile'))
        ->assertSee($this->user->email);
});

it('shows the user IBAN', function () {
    $this->actingAs($this->user)
        ->get(route('profile'))
        ->assertSee($this->user->iban);
});

it('shows the user IBAN ascription', function () {
    $this->actingAs($this->user)
        ->get(route('profile'))
        ->assertSee($this->user->iban_name);
});

it('lets the user update their name', function () {
    $this->actingAs($this->user)
        ->post(route('profile.update'), [
            'name' => $name = $this->faker->name,
            'email' => $this->user->email,
            'iban' => $this->user->iban,
            'iban_name' => $this->user->iban_name,
        ])
        ->assertRedirect(route('profile'));

    $this->assertEquals($name, $this->user->fresh()->name);
});

it('lets the user update their email', function () {
    $this->actingAs($this->user)
        ->post(route('profile.update'), [
            'name' => $this->user->name,
            'email' => $email = $this->faker->safeEmail,
            'iban' => $this->user->iban,
            'iban_name' => $this->user->iban_name,
        ])
        ->assertRedirect(route('profile'));

    $this->assertEquals($email, $this->user->fresh()->email);
});

it('lets the user update their iban', function () {
    $this->actingAs($this->user)
        ->post(route('profile.update'), [
            'name' => $this->user->name,
            'email' => $this->user->email,
            'iban' => $iban = $this->faker->iban('NL'),
            'iban_name' => $this->user->iban_name,
        ])
        ->assertRedirect(route('profile'));

    $this->assertEquals($iban, $this->user->fresh()->iban);
});

it('lets the user update their iban name', function () {
    $this->actingAs($this->user)
        ->post(route('profile.update'), [
            'name' => $this->user->name,
            'email' => $this->user->email,
            'iban' => $this->user->iban,
            'iban_name' => $ibanName = $this->faker->name,
        ])
        ->assertRedirect(route('profile'));

    $this->assertEquals($ibanName, $this->user->fresh()->iban_name);
});

it('fails if name is missing', function () {
    $this->actingAs($this->user)
        ->post(route('profile.update'), [
            'email' => $this->user->email,
        ])
        ->assertSessionHasErrors('name');
});

it('fails if email is missing', function () {
    $this->actingAs($this->user)
        ->post(route('profile.update'), [
            'name' => $this->user->name,
        ])
        ->assertSessionHasErrors('email');
});
