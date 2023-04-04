<?php

namespace App\Interfaces;

use App\Enums\InvestmentStatus;
use App\Models\Investment;
use App\Models\User;

interface InvestmentRepositoryInterface
{
    public function create(array $data, int $projectId, User $user): Investment;

    public function setInvestmentStatus(Investment $investment, InvestmentStatus $status): void;
}
