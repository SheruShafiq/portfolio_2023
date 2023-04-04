<?php

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    $this->user = User::factory()->create();

    $this->pendingProject = Project::factory()
        ->for($this->user)
        ->pending()
        ->create();

    $this->activeProject = Project::factory()
        ->for($this->user)
        ->funding()
        ->create();
});

it('loads the page', function () {
    $this->actingAs($this->user)
        ->get(route('profile.projects.edit', $this->activeProject))
        ->assertOk();
});

it('redirects to login page if user is not authenticated', function () {
    $this->get(route('profile.projects.edit', $this->pendingProject))
        ->assertRedirect(route('login'));
});

it('shows a 404 page if user is not the owner of the project', function () {
    $this->actingAs(User::factory()->create())
        ->get(route('profile.projects.edit', $this->pendingProject))
        ->assertNotFound();
});

it('shows the project name', function () {
    $this->actingAs($this->user)
        ->get(route('profile.projects.edit', $this->pendingProject))
        ->assertSee($this->pendingProject->name);
});

it('shows the project amounts', function () {
    $this->actingAs($this->user)
        ->get(route('profile.projects.edit', $this->pendingProject))
        ->assertSee($this->pendingProject->totalAmount)
        ->assertSee($this->pendingProject->own_contribution)
        ->assertSee($this->pendingProject->external_contribution)
        ->assertSee($this->pendingProject->crowdfunding_contribution);
});

it('shows the interest rate and duration of the project', function () {
    $this->actingAs($this->user)
        ->get(route('profile.projects.edit', $this->pendingProject))
        ->assertSee($this->pendingProject->interest_rate)
        ->assertSee($this->pendingProject->duration);
});

it('shows the iban and iban name of the project', function () {
    $this->actingAs($this->user)
        ->get(route('profile.projects.edit', $this->pendingProject))
        ->assertSee($this->pendingProject->iban)
        ->assertSee($this->pendingProject->iban_name);
});

it('shows the project location', function () {
    $this->actingAs($this->user)
        ->get(route('profile.projects.edit', $this->pendingProject))
        ->assertSee($this->pendingProject->location);
});

it('shows the project description', function () {
    $this->actingAs($this->user)
        ->get(route('profile.projects.edit', $this->pendingProject))
        ->assertSee($this->pendingProject->description);
});

it('lets the user edit the project name while the project is pending', function () {
    $this->actingAs($this->user)
        ->patch(route('projects.update', $this->pendingProject), [
            'name' => $this->faker->company,
            'description' => $this->pendingProject->description,
            'location' => $this->pendingProject->location,
            'total_amount' => $this->pendingProject->totalAmount,
            'iban' => $this->pendingProject->iban,
            'iban_name' => $this->pendingProject->iban_name,
        ])->assertRedirect(route('profile.projects.edit', $this->pendingProject->fresh()));

    $this->assertDatabaseHas('projects', [
        'id' => $this->pendingProject->id,
        'name' => $this->pendingProject->fresh()->name,
    ]);
});

it('lets the user edit the project iban and iban name while the project is pending', function () {
    $this->actingAs($this->user)
        ->patch(route('projects.update', $this->pendingProject), [
            'name' => $this->pendingProject->name,
            'description' => $this->pendingProject->description,
            'location' => $this->pendingProject->location,
            'total_amount' => $this->pendingProject->totalAmount,
            'iban' => $this->faker->iban('NL'),
            'iban_name' => $this->faker->name,
        ])->assertRedirect(route('profile.projects.edit', $this->pendingProject->fresh()));

    $this->assertDatabaseHas('projects', [
        'id' => $this->pendingProject->id,
        'iban' => $this->pendingProject->fresh()->iban,
        'iban_name' => $this->pendingProject->fresh()->iban_name,
    ]);
});

it('lets the user edit the project location while the project is pending', function () {
    $this->actingAs($this->user)
        ->patch(route('projects.update', $this->pendingProject), [
            'name' => $this->pendingProject->name,
            'description' => $this->pendingProject->description,
            'location' => $this->faker->city,
            'total_amount' => $this->pendingProject->totalAmount,
            'iban' => $this->pendingProject->iban,
            'iban_name' => $this->pendingProject->iban_name,
        ])->assertRedirect(route('profile.projects.edit', $this->pendingProject->fresh()));

    $this->assertDatabaseHas('projects', [
        'id' => $this->pendingProject->id,
        'location' => $this->pendingProject->fresh()->location,
    ]);
});

it('lets the user edit the project description while the project is pending', function () {
    $this->actingAs($this->user)
        ->patch(route('projects.update', $this->pendingProject), [
            'name' => $this->pendingProject->name,
            'description' => $this->faker->paragraph,
            'location' => $this->pendingProject->location,
            'total_amount' => $this->pendingProject->totalAmount,
            'iban' => $this->pendingProject->iban,
            'iban_name' => $this->pendingProject->iban_name,
        ])->assertRedirect(route('profile.projects.edit', $this->pendingProject->fresh()));

    $this->assertDatabaseHas('projects', [
        'id' => $this->pendingProject->id,
        'description' => $this->pendingProject->fresh()->description,
    ]);
});
