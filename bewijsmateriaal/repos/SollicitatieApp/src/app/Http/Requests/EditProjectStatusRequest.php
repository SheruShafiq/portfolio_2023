<?php

namespace App\Http\Requests;

use App\Enums\ProjectStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class EditProjectStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->id === $this->project->user->id;
    }

    public function rules(): array
    {
        return [
            'status' => ['required', new enum(ProjectStatus::class)],
        ];
    }
}
