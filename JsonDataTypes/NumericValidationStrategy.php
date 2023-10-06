<?php

namespace JsonDataTypes;

use InterfaceValidation\ValidationStrategy;

class NumericValidationStrategy implements ValidationStrategy
{
    public function isValid($value)
    {
        return is_numeric($value);
    }
}