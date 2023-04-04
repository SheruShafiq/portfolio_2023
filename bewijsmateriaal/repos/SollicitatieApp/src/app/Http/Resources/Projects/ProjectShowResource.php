<?php

namespace App\Http\Resources\Projects;

use App\Enums\InvestmentStatus;

class ProjectShowResource extends ProjectIndexResource
{
    public function toArray($request): array
    {
        $parse = new \Parsedown();

        return parent::toArray($request) + [
            'description' => $parse->text($this->description),
            'investments' => ProjectInvestmentResource::collection($this->investments()->where('status', InvestmentStatus::Accepted->value)->get()),
            'total_invested' => number_format($this->investments()->sum('amount'), 0, ',', '.'),
            'formatted_own_contribution' => number_format($this->own_contribution, 0, ',', '.'),
            'formatted_external_contribution' => number_format($this->external_contribution, 0, ',', '.'),
            'formatted_total_amount' => number_format($this->total_amount, 0, ',', '.'),
        ];
    }
}
