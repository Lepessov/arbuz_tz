<?php

namespace JsonDataTypes;

use InterfaceValidation\ValidationStrategy;

class KazakhstanPhoneNumberValidationStrategy implements ValidationStrategy
{
    public function isValid($value)
    {
        // Use the regular expression pattern for Kazakhstan phone numbers.
        $pattern = '/^(\+7|7|8)\s?\(7\d{2}\)\s?\d{3}-\d{2}-\d{2}$/';
        return preg_match($pattern, $value) === 1;
    }
}