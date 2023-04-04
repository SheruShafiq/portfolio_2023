<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class MultipleOfHundred implements InvokableRule
{
    public function __invoke($attribute, $value, $fail): void
    {
        if ($value % 100 !== 0) {
            $fail('Het bedrag moet een honderdtal zijn.');
        }
    }
}
