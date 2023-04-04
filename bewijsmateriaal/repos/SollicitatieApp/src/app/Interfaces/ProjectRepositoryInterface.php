<?php

namespace App\Interfaces;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface ProjectRepositoryInterface
{
    public function getHighestFundedProjects(): Collection;

    public function getNewestProjects(): Collection;

    public function getFundingProgress();

    public function create(array $data, User $user): Project;

    public function update(Project $project, array $data): Project;

    public function updateStatus(Project $project, array $data): Project;
}
