<?php

namespace JsonResponseValidator;

use InterfaceValidation\ValidationStrategy;

class JsonResponseValidator
{
    private $validationRules = [];

    public function addValidationRule($field, ValidationStrategy $strategy)
    {
        $this->validationRules[$field] = $strategy;
    }

    public function validate($jsonResponse)
    {
        $data = json_decode($jsonResponse, true);

        if ($data === null) {
            throw new \InvalidArgumentException("Invalid JSON response");
        }

        $errors = [];

        foreach ($this->validationRules as $field => $strategy) {
            if (!isset($data[$field]) || !$strategy->isValid($data[$field])) {
                $errors[] = "'$field' validation failed";
            }
        }

        if (!empty($errors)) {
            throw new \InvalidArgumentException("Validation errors: " . implode(', ', $errors));
        }

        return true;
    }
}