<?php
namespace Project4\Arrays;

class Summary 
{
    function sum(array $array)
    {
        return array_sum($array);
    }

    function check(array $array)
    {
        foreach ($array as $value) {
            if (!is_numeric($value))
            {
                throw new NumericException();
            }
        }
    }
}