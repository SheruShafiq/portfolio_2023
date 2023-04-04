<?php

use App\Models\Investment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();

    Project::factory()
        ->funding()
        ->has(Investment::factory(['user_id' => $this->user->id])
        ->count(3))
        ->create();

    $this->actingAs($this->user);
});

it('loads the page', function () {
    $this->get(route('profile.investments'))
        ->assertOk();
});

it('shows the users full name and email', function () {
    $this->get(route('profile.investments'))
        ->assertSee($this->user->name)
        ->assertSee($this->user->email);
});

it('shows all investments', function () {
    $this->user->investments->each(function ($investment) {
        $this->get(route('profile.investments'))
            ->assertSee($investment->amount)
            ->assertSee($investment->created_at)
            ->assertSee($investment->project->status->value)
            ->assertSee($investment->project->name);
    });
});

it('shows the total amount of investments', function () {
    $this->get(route('profile.investments'))
        ->assertSee($this->user->investments->sum('amount'));
});
