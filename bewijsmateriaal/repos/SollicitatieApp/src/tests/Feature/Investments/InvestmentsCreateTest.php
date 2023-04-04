<?php

use App\Enums\InvestmentStatus;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

BeforeEach(function () {
    $this->user = User::factory()->create();

    $this->project = Project::factory()
        ->funding()
        ->create();

    $this->actingAs($this->user);
});

it('loads the page', function () {
    $this->get(route('investments.create', $this->project))
        ->assertOk();
});

it('shows the project information', function () {
    $this->get(route('investments.create', $this->project))
        ->assertSee($this->project->name)
        ->assertSee($this->project->location)
        ->assertSee($this->project->user->name)
        ->assertSee($this->project->fundingProgress)
        ->assertSee($this->project->duration)
        ->assertSee($this->project->interest_rate)
        ->assertSee($this->project->crowdfunding_contribution)
        ->assertSee($this->project->investments()->sum('amount'));
});

it('shows the users full name', function () {
    $this->get(route('investments.create', $this->project))
        ->assertSee($this->user->name);
});

it('shows the users email', function () {
    $this->get(route('investments.create', $this->project))
        ->assertSee($this->user->email);
});

it('shows the users IBAN and IBAN ascription', function () {
    $this->get(route('investments.create', $this->project))
        ->assertSee($this->user->iban)
        ->assertSee($this->user->iban_name);
});

it('lets the user make an investment and redirects them to the agreement page', function () {
    $this->post(route('investments.store', $this->project), [
        'iban' => $this->user->iban,
        'iban_name' => $this->user->iban_name,
        'amount' => 1000,
    ]);

    $this->assertDatabaseHas('investments', [
        'user_id' => $this->user->id,
        'project_id' => $this->project->id,
        'amount' => 1000,
        'status' => InvestmentStatus::Pending,
    ]);
});

it('does not let the user make an investment if the amount is less than the minimum investment amount', function () {
    $this->post(route('investments.store', $this->project), [
        'iban' => $this->user->iban,
        'iban_name' => $this->user->iban_name,
        'amount' => 99,
    ])->assertSessionHasErrors(['amount']);
});

it('does not let the user make an investment if the amount is not a hundred', function () {
    $this->post(route('investments.store', $this->project), [
        'iban' => $this->user->iban,
        'iban_name' => $this->user->iban_name,
        'amount' => 150,
    ])->assertSessionHasErrors(['amount']);
});

it('does not let the user make an investment without iban or iban name', function () {
    $this->post(route('investments.store', $this->project), [
        'iban' => '',
        'iban_name' => '',
        'amount' => 1000,
    ])->assertSessionHasErrors(['iban', 'iban_name']);
});
