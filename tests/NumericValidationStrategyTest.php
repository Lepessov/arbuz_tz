<?php

use PHPUnit\Framework\TestCase;
use JsonDataTypes\NumericValidationStrategy;

class NumericValidationStrategyTest extends TestCase
{
    public function testValidNumeric()
    {
        $validator = new NumericValidationStrategy();
        $this->assertTrue($validator->isValid(42));
    }

    public function testInvalidNumeric()
    {
        $validator = new NumericValidationStrategy();
        $this->assertFalse($validator->isValid('Hello')); // Not numeric
    }
}