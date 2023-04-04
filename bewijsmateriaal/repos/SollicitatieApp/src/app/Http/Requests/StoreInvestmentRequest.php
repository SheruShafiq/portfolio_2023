<?php

namespace App\Http\Requests;

use App\Rules\MultipleOfHundred;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvestmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'iban' => ['required', 'string', 'max:255'],
            'iban_name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:100', 'max:'.$this->project->maximum_investment, new MultipleOfHundred],
        ];
    }
}
