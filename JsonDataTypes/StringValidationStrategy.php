<?php

namespace JsonDataTypes;

use InterfaceValidation\ValidationStrategy;

class StringValidationStrategy implements ValidationStrategy
{
    public function isValid($value)
    {
        return is_string($value);
    }
}