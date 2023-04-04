<?php

use App\Enums\InvestmentStatus;
use App\Models\Investment;
use App\Models\Project;
use App\Models\User;
use App\Repositories\InvestmentRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->repository = app(InvestmentRepository::class);
});

it('creates an investment', function () {
    $project = Project::factory()->create();
    $user = User::factory()->create();

    $this->repository->create(
        [
            'amount' => 400,
            'iban' => 'NL00RABO0123412123',
            'iban_name' => 'Harko Sorbato',
        ],
        $project->id, $user);

    expect($project->fresh()->investments()->count())->toBe(1);
});

it('sets the investment status from an enum', function () {
    $investment = Investment::factory()
        ->pending()
        ->create();

    $this->repository->setInvestmentStatus($investment, InvestmentStatus::Accepted);

    expect($investment->fresh()->status)->toBe(InvestmentStatus::Accepted);
});

it('does not allow non enum values when setting the status', function () {
    $investment = Investment::factory()
        ->pending()
        ->create();

    expect(fn () => $this->repository->setInvestmentStatus($investment, 'foobar'))
        ->toThrow(TypeError::class);
});
