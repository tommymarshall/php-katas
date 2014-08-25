<?php

class RomanNumerals
{
    protected static $mappings = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    public function convert($number)
    {
        $result = 0;



        while(strlen($number) > 1) {
            $current = static::$mappings[$number[0]];
            $next    = static::$mappings[$number[1]];

            if ($current >= $next) {
                $result += $current;
                $number = substr($number, 1);
            } else {
                $result += $next - $current;
                $number = substr($number, 2);
            }
        }

        if ($number) {
            $result += static::$mappings[$number];
        }

        return $result;
    }
}
