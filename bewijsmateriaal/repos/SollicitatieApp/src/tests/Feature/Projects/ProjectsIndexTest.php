<?php

use App\Models\Investment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
beforeEach(function () {
    $this->user = User::factory()->create();

    $this->projects = Project::factory([
        'own_contribution' => 100000,
        'external_contribution' => 300000,
        'crowdfunding_contribution' => 600000,
    ])
        ->funding()
        ->count(13)
        ->sequence(fn ($sequence) => ['created_at' => now()->subHours($sequence->index)])
        ->create();

    $this->projects->each(function ($project, $index) {
        Investment::factory([
            'amount' => 100 * ($index + 1),
        ])
            ->for($this->user)
            ->for($project)
            ->count(5)
            ->create();
    });

    $this->pendingProject = Project::factory([
        'user_id' => User::factory()->create()->id,
        'created_at' => now()->subHours($this->projects->count()),
    ])
        ->pending()
        ->create();
});

it('loads the projects index page', function () {
    $this->get(route('projects.index'))
        ->assertStatus(200);
});

it('loads the projects index page with pagination', function () {
    $this->get(route('projects.index'))
        ->assertStatus(200)
        ->assertSee('Volgende')
        ->assertSee('Vorige');
});

it('shows twelve projects per page', function () {
    $this->get(route('projects.index'))
        ->assertStatus(200)
        ->assertSee($this->projects->first->title)
        ->assertSee($this->projects->get(11)->title)
        ->assertDontSee($this->projects->last()->title);
});

it('does not show projects that are not active', function () {
    $this->get(route('projects.index'))
        ->assertStatus(200)
        ->assertDontSee($this->pendingProject->title);
});

it('also shows my own projects no matter the status', function () {
    $this->actingAs($this->pendingProject->user)
        ->get(route('projects.index'))
        ->assertStatus(200)
        ->assertSee($this->pendingProject->title);
});

it('shows the projects that have a name like the search query', function () {
    $this->get(route('projects.index', ['search' => $this->projects->first()->name]))
        ->assertStatus(200)
        ->assertSee($this->projects->first()->name)
        ->assertDontSee($this->projects->last()->name);
});

it('sorts the projects from new to old', function () {
    $this->get(route('projects.index', ['sort' => 'newest']))
        ->assertStatus(200)
        ->assertSeeInOrder(
            $this->projects->take(3)->pluck('name')->toArray()
        );
});

it('sorts the projects from old to new', function () {
    $this->get(route('projects.index', ['sort' => 'oldest']))
        ->assertStatus(200)
        ->assertSeeInOrder(
            $this->projects->reverse()->take(3)->pluck('name')->toArray()
        );
});

it('sorts the projects from highest funding to lowest funding', function () {
    $projects = $this->projects->reverse()->take(3)->pluck('name')->toArray();

    $this->get(route('projects.index', ['sort' => 'highest']))
        ->assertStatus(200)
        ->assertSeeInOrder($projects);
});

it('sorts the projects from lowest funding to highest funding', function () {
    $projects = $this->projects->take(3)->pluck('name')->toArray();

    $this->get(route('projects.index', ['sort' => 'lowest']))
        ->assertStatus(200)
        ->assertSeeInOrder($projects);
});
