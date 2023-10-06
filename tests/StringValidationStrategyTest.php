<?php

use PHPUnit\Framework\TestCase;
use JsonDataTypes\StringValidationStrategy;

class StringValidationStrategyTest extends TestCase
{
    public function testValidString()
    {
        $validator = new StringValidationStrategy();
        $this->assertTrue($validator->isValid('Hello, World!'));
    }

    public function testInvalidString()
    {
        $validator = new StringValidationStrategy();
        $this->assertFalse($validator->isValid(42)); // Not a string
    }
}
