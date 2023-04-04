<?php

namespace App\Http\Resources\Projects;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectInvestmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'amount' => number_format($this->amount, 0, ',', '.'),
            'invested_at' => $this->created_at->diffForHumans(),
        ];
    }
}
