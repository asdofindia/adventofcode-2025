<?php

namespace AOC\Challenge2;

class Validator
{
    public static function allSame(array $input): bool
    {
        $first = $input[0];
        foreach ($input as $item) {
            if ($item !== $first) {
                return false;
            }
        }
        return true;
    }
    /**
     * @return bool works?
     */
    public static function splitAndCompare(string $num, int $length): bool
    {
        $split = \str_split($num, $length);
        return Validator::allSame($split);
    }
    public static function isInvalid(int $num, bool $exactlyTwice = true): bool
    {
        $numAsString = (string) $num;
        $length = \strlen($num);
        if ($exactlyTwice) {
            if ($length % 2 === 1) {
                return false;
            }
            return Validator::splitAndCompare($numAsString, $length / 2);
        } else {
            $maxLength = \strlen($num) / 2;
            $currLength = $maxLength;
            while ($currLength >= 1) {
                $isInvalid = Validator::splitAndCompare(
                    $numAsString,
                    $currLength,
                );
                if ($isInvalid) {
                    return true;
                }
            }
            return false;
        }
    }
}
