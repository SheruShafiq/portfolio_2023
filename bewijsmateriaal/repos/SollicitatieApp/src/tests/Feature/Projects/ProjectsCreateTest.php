<?php

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    $this->user = User::factory()->create();

    $this->actingAs($this->user);
});

it('loads the page', function () {
    $this->get(route('projects.create'))
        ->assertOk();
});

it('shows the default interest rate', function () {
    $this->get(route('projects.create'))
        ->assertSee(config('crowdfunding.interest'));
});

it('shows the default duration', function () {
    $this->get(route('projects.create'))
        ->assertSee(config('crowdfunding.duration'));
});

it('shows the users IBAN and IBAN ascription', function () {
    $this->get(route('projects.create'))
        ->assertSee($this->user->iban)
        ->assertSee($this->user->iban_name);
});

it('lets the user create a project', function () {
    $project = collect(Project::factory()->make());

    $project->put('amount', ($project->get('own_contribution') / (config('crowdfunding.contributions.own') * 100)) * 100);

    $this->post(route('projects.store'), $project->toArray())
        ->assertRedirect();

    $project->pop('amount');

    $this->assertDatabaseHas('projects', $project->toArray());
});
