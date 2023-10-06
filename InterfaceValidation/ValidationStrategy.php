<?php

namespace InterfaceValidation;

interface ValidationStrategy
{
    public function isValid($value);
}