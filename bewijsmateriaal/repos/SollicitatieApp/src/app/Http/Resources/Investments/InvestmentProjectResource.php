<?php

namespace App\Http\Resources\Investments;

use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentProjectResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status->value,
            'translated_status' => trans('app.'.$this->status->value),
        ];
    }
}
