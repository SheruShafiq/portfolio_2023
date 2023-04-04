<?php

namespace App\Http\Requests;

use App\Rules\MultipleOfHundred;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                ...$this->isPrecognitive()
                    ? [Rule::unique('projects', 'name')]
                    : ['required', 'string', 'max:255', Rule::unique('projects', 'name')],
            ],
            'description' => [
                ...$this->isPrecognitive()
                    ? []
                    : ['required', 'string'],
            ],
            'location' => [
                ...$this->isPrecognitive()
                    ? ['max:255']
                    : ['required', 'string', 'max:255'],
            ],
            'amount' => [
                ...$this->isPrecognitive()
                    ? ['nullable', 'integer', 'min:5000', new MultipleOfHundred]
                    : ['required', 'integer', 'min:5000', new MultipleOfHundred],
            ],
            'iban' => [
                ...$this->isPrecognitive()
                    ? ['max:255']
                    : ['required', 'string', 'max:255'],
            ],
            'iban_name' => [
                ...$this->isPrecognitive()
                    ? ['max:255']
                    : ['required', 'string', 'max:255'],
            ],
        ];
    }
}
