<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $domainPart = explode('@', $value)[1] ?? null;

        if (!$domainPart) {
            return false;
        }

        $allowedDomain = array("gmail.com", "outlook.com", "gov.in");

        if (!in_array($domainPart, $allowedDomain)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a gov, gmail, outlook email addresses';
    }
}
