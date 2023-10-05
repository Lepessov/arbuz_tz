<?php

class JsonResponseValidator
{
    public static function validate($jsonResponse)
    {
        $data = json_decode($jsonResponse, true);

        if ($data === null) {
            throw new \InvalidArgumentException("Invalid JSON response");
        }

        $errors = [];

        if (!isset($data['foo']) || !is_numeric($data['foo'])) {
            $errors[] = "'foo' should be numeric";
        }

        if (!isset($data['bar']) || !is_string($data['bar'])) {
            $errors[] = "'bar' should be a string";
        }

        if (!isset($data['baz']) || !self::isValidKazakhstanPhoneNumber($data['baz'])) {
            $errors[] = "'baz' should be a valid Kazakhstani phone number";
        }

        if (!empty($errors)) {
            throw new \InvalidArgumentException("Validation errors: " . implode(', ', $errors));
        }
    }

    private static function isValidKazakhstanPhoneNumber($phoneNumber)
    {
        // Use a regular expression pattern that matches Kazakhstani phone numbers.
        $pattern = '/^(\+7|7|8)\s?\(7\d{2}\)\s?\d{3}-\d{2}-\d{2}$/';

        return preg_match($pattern, $phoneNumber) === 1;
    }
}