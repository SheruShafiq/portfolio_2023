<?php

use App\Enums\ProjectStatus;
use App\Models\Investment;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

it('determines the maximal investment amount', function () {
    $project = Project::factory(['crowdfunding_contribution' => 5000])
        ->has(Investment::factory(['amount' => 1000]))
        ->has(Investment::factory(['amount' => 1000]))
        ->create();

    expect($project->maximum_investment)->toBe(3000);
});

it('calculates the percentage of the funding', function () {
    $project = Project::factory(['crowdfunding_contribution' => 5000])
        ->has(Investment::factory(['amount' => 1000]))
        ->has(Investment::factory(['amount' => 1000]))
        ->create();

    expect($project->funding_progress)->toEqual(40);
});

it('calculates the total investment of the project', function () {
    $project = Project::factory([
        'own_contribution' => 1000,
        'external_contribution' => 1000,
        'crowdfunding_contribution' => 1000,
    ])->create();

    expect($project->total_amount)->toEqual(3000);
});

it('can determine if a project is pending', function () {
    $pendingProject = Project::factory([
        'status' => ProjectStatus::Pending,
    ])->create();

    $activeProject = Project::factory([
        'status' => ProjectStatus::Funding,
    ])->create();

    expect($pendingProject->is_pending)->toBeTrue();
    expect($activeProject->is_pending)->toBeFalse();
});

it('can determine if a project belongs to the current user', function () {
    $project = Project::factory()->create();
    $otherProject = Project::factory()->create();

    actingAs($project->user);

    expect($project->belongs_to_current_user)->toBeTrue();
    expect($otherProject->belongs_to_current_user)->toBeFalse();
});
