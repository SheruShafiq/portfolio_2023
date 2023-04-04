<?php

namespace App\Http\Requests;

use App\Enums\ProjectStatus;
use App\Rules\MultipleOfHundred;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->project->belongs_to_current_user;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('projects', 'name')->ignore($this->project->id)],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'total_amount' => ['required', 'integer', 'min:5000', new MultipleOfHundred],
            'iban' => [Rule::requiredIf($this->status !== ProjectStatus::Pending), 'nullable', 'string', 'max:255'],
            'iban_name' => [Rule::requiredIf($this->status !== ProjectStatus::Pending), 'nullable', 'string', 'max:255'],
        ];
    }
}
