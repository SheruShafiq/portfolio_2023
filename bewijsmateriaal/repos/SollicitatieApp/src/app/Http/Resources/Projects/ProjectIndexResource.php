<?php

namespace App\Http\Resources\Projects;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectIndexResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'location' => $this->location,
            'crowdfunding_contribution' => $this->crowdfunding_contribution,
            'total_amount' => $this->total_amount,
            'funding_progress' => $this->fundingProgress,
            'formatted_crowdfunding_contribution' => number_format($this->crowdfunding_contribution, 0, ',', '.'),
            'duration' => $this->duration,
            'interest_rate' => $this->interest_rate,
            'user' => $this->user->name,
            'status' => $this->status->value,
            'is_pending' => $this->is_pending,
            'translated_status' => trans('app.'.$this->status->value),
        ];
    }
}
