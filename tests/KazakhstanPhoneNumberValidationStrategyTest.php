<?php

use PHPUnit\Framework\TestCase;
use JsonDataTypes\KazakhstanPhoneNumberValidationStrategy;

class KazakhstanPhoneNumberValidationStrategyTest extends TestCase
{
    public function testValidKazakhstanPhoneNumber()
    {
        $validator = new KazakhstanPhoneNumberValidationStrategy();
        $this->assertTrue($validator->isValid('+7 (701) 123-45-67'));
    }

    public function testInvalidKazakhstanPhoneNumber()
    {
        $validator = new KazakhstanPhoneNumberValidationStrategy();
        $this->assertFalse($validator->isValid('12345'));
    }
}