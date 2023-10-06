<?php

use JsonDataTypes\KazakhstanPhoneNumberValidationStrategy;
use JsonDataTypes\NumericValidationStrategy;
use JsonDataTypes\StringValidationStrategy;
use JsonResponseValidator\JsonResponseValidator;
use PHPUnit\Framework\TestCase;

class JsonResponseValidatorTest extends TestCase
{
    public function testValidJsonResponse()
    {
        $validator = new JsonResponseValidator();
        $validator->addValidationRule('foo', new NumericValidationStrategy());
        $validator->addValidationRule('bar', new StringValidationStrategy());
        $validator->addValidationRule('baz', new KazakhstanPhoneNumberValidationStrategy());

        $jsonResponse = '{"foo": 42, "bar": "Hello", "baz": "+7 (701) 123-45-67"}';

        $this->assertTrue($validator->validate($jsonResponse));
    }
}