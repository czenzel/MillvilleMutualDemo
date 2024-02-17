<?php
namespace Project4\Arrays;

class Summary 
{
    public function sum(array $array)
    {
        return array_sum($array);
    }

    public function check(array $array)
    {
        foreach ($array as $value) {
            if (!is_numeric($value))
            {
                throw new Project4\Exceptions\NumericException();
            }
        }
    }
}