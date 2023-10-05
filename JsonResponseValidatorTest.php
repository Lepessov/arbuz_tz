<?php

use PHPUnit\Framework\TestCase;

require 'JsonResponseValidator.php';

class JsonResponseValidatorTest extends TestCase
{
    public function testValidJsonResponse()
    {
        $jsonResponse = '{"foo": "123", "bar": 456, "baz": "8 (707) 288-56-23"}';

        try {
            JsonResponseValidator::validate($jsonResponse);
            $this->addToAssertionCount(1);
        } catch (\InvalidArgumentException $e) {
            $this->fail("Validation error: " . $e->getMessage());
        }
    }

    public function testInvalidJsonResponseBarNotString()
    {
        $jsonResponse = '{"foo": "123", "bar": 456, "baz": "8 (707) 288-56-23"}';

        try {
            JsonResponseValidator::validate($jsonResponse);
            $this->fail("Expected validation error for 'bar' not being a string.");
        } catch (\InvalidArgumentException $e) {
            $this->assertStringContainsString("'bar' should be a string", $e->getMessage());
        }
    }

    public function testInvalidJsonResponseBazNotKazakhstaniPhoneNumber()
    {
        $jsonResponse = '{"foo": "123", "bar": "asd", "baz": "invalid-phone"}';

        try {
            JsonResponseValidator::validate($jsonResponse);
            $this->fail("Expected validation error for 'baz' not being a valid Kazakhstani phone number.");
        } catch (\InvalidArgumentException $e) {
            $this->assertStringContainsString("'baz' should be a valid Kazakhstani phone number", $e->getMessage());
        }
    }
}
