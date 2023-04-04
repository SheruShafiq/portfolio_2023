<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Projects\ProjectShowResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProjectResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'projects' => ProjectShowResource::collection($this->projects()->orderBy('created_at', 'desc')->get()),
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
