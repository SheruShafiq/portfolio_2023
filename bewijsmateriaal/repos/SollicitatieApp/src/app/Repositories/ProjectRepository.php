<?php

namespace App\Repositories;

use App\Enums\ProjectStatus;
use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getHighestFundedProjects(): Collection
    {
        return Project::orderBy(DB::raw('(
            SELECT SUM(amount) / projects.crowdfunding_contribution * 100
            FROM investments
            WHERE project_id = projects.id)
            '), 'desc')->take(8)->get();
    }

    public function getNewestProjects(): Collection
    {
        return Project::latest()->take(4)->get();
    }

    public function getFundingProgress(): Expression
    {
        return DB::raw('(
            SELECT SUM(amount) / projects.crowdfunding_contribution
            FROM investments
            WHERE project_id = projects.id)
        ');
    }

    public function create(array $data, User $user): Project
    {
        return Project::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'location' => $data['location'],
            'crowdfunding_contribution' => $data['amount'] * config('crowdfunding.contributions.crowdfunding'),
            'external_contribution' => $data['amount'] * config('crowdfunding.contributions.external'),
            'own_contribution' => $data['amount'] * config('crowdfunding.contributions.own'),
            'status' => ProjectStatus::Pending,
            'iban' => $data['iban'],
            'iban_name' => $data['iban_name'],
            'user_id' => $user->id,
        ]);
    }

    public function update(Project $project, array $data): Project
    {
        $project->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'location' => $data['location'],
            'crowdfunding_contribution' => $data['total_amount'] * config('crowdfunding.contributions.crowdfunding'),
            'external_contribution' => $data['total_amount'] * config('crowdfunding.contributions.external'),
            'own_contribution' => $data['total_amount'] * config('crowdfunding.contributions.own'),
            'iban' => $data['iban'],
            'iban_name' => $data['iban_name'],
        ]);

        return $project;
    }

    public function updateStatus(Project $project, array $data): Project
    {
        $project->update([
            'status' => ProjectStatus::from($data['status']),
        ]);

        return $project;
    }
}
