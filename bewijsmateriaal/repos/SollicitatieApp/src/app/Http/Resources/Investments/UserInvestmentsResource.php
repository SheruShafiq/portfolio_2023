<?php

namespace App\Http\Resources\Investments;

use Illuminate\Http\Resources\Json\JsonResource;

class UserInvestmentsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'total_invested' => $this->total_invested,
            'investments' => InvestmentResource::collection($this->investments()->orderBy('created_at', 'desc')->get()),
        ];
    }
}
