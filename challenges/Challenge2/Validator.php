<?php

namespace AOC\Challenge2;

class Validator
{
    public static function isValid(int $num): bool
    {
        $numAsString = (string) $num;
        $length = \strlen($numAsString);
        if ($length % 2 === 1) {
            return false;
        }
        $firstHalf = \substr($numAsString, 0, $length / 2);
        $secondHalf = \substr($numAsString, $length / 2);
        if ($firstHalf === $secondHalf) {
            return true;
        }
        return false;
    }
}
