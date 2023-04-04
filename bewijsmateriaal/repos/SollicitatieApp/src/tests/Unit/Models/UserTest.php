<?php

use App\Models\Investment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('it calculates the total invested amount', function () {
    $user = User::factory()
        ->has(Investment::factory(['amount' => 300])->count(5))
        ->create();

    expect($user->total_invested)->toEqual(1500);
});
