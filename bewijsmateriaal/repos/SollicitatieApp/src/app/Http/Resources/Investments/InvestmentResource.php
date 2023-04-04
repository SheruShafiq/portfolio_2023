<?php

namespace App\Http\Resources\Investments;

use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'amount' => $this->amount,
            'project' => new InvestmentProjectResource($this->project),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
