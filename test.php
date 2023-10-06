<?php

require ('vendor/autoload.php');

use JsonDataTypes\KazakhstanPhoneNumberValidationStrategy;
use JsonDataTypes\NumericValidationStrategy;
use JsonDataTypes\StringValidationStrategy;
use JsonResponseValidator\JsonResponseValidator;

$validator = new JsonResponseValidator();
$validator->addValidationRule('foo', new NumericValidationStrategy());
$validator->addValidationRule('bar', new StringValidationStrategy());
$validator->addValidationRule('baz', new KazakhstanPhoneNumberValidationStrategy());

$jsonResponse = '{"foo": 42, "bar": "Hello", "baz": "+7 (701) 123-45-67"}';

try {
    if($validator->validate($jsonResponse)) {
        echo "Validation passed";
    }
} catch (\InvalidArgumentException $e) {
    echo "Validation failed: " . $e->getMessage();
}