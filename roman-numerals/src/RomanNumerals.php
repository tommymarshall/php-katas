<?php

class RomanNumerals
{
    public function convert($number)
    {
        $result = 0;
        $mappings = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'M' => 1000,
        ];

        while(strlen($number) > 1) {
            $current = $mappings[$number[0]];
            $next = $mappings[$number[1]];

            if ($current >= $next) {
                $result += $current;
                $number = substr($number, 1);
            } else {
                $result += $next - $current;
                $number = substr($number, 2);
            }
        }

        if ($number) {
            $result += $mappings[$number];
        }

        return $result;
    }
}
