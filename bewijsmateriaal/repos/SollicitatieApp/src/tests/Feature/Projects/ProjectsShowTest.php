<?php

use App\Models\Investment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->project = Project::factory([
        'user_id' => User::factory()->create()->id,
    ])
        ->funding()
        ->create();

    $this->project->each(function ($project) {
        Investment::factory([
            'user_id' => User::factory()->create()->id,
        ])
            ->for($project)
            ->create();
    });
});

it('loads the page', function () {
    $this->get(route('projects.show', $this->project))
        ->assertOk();
});

it('shows the project details', function () {
    $this->get(route('projects.show', $this->project))
        ->assertSee($this->project->name)
        ->assertSee($this->project->location)
        ->assertSee($this->project->user->name)
        ->assertSee($this->project->duration)
        ->assertSee($this->project->interest_rate)
        ->assertSee($this->project->description);
});

it('shows the project progress', function () {
    $this->get(route('projects.show', $this->project))
        ->assertSee(number_format($this->project->investments()->sum('amount'), 0, ',', '.'))
        ->assertSee(number_format($this->project->crowdfunding_contribution, 0, ',', '.'))
        ->assertSee($this->project->fundingProgress);
});

it('shows all investments', function () {
    $response = $this->get(route('projects.show', $this->project));

    $this->project->investments()->each(function ($investment) use ($response) {
        $response->assertSee(number_format($investment->amount, 0, ',', '.'))
            ->assertSee($investment->created_at->diffForHumans());
    });
});
