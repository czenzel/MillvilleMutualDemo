<?php

namespace Project4\Exceptions;

class NumericException extends \Exception
{
    public function __construct($message = 'Numeric array expected', $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}