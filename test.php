<?php

require 'JsonResponseValidator.php';

$jsonResponse = '{"foo": "1234", "bar": "asd", "baz": "8 (707) 288-56-23"}';

try {
    JsonResponseValidator::validate($jsonResponse);
    echo "JSON response is valid!";
} catch (\InvalidArgumentException $e) {
    echo "Validation error: " . $e->getMessage();
}
