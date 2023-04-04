<?php

namespace App\Http\Resources\Projects;

class ProjectEditResource extends ProjectIndexResource
{
    public function toArray($request): array
    {
        return parent::toArray($request) + [
            'description' => $this->description,
            'own_contribution' => $this->own_contribution,
            'external_contribution' => $this->external_contribution,
            'iban' => $this->iban,
            'iban_name' => $this->iban_name,
        ];
    }
}
