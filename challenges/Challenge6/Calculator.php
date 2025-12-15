<?php

namespace AOC\Challenge6;

class Calculator
{
    /**
     * @@param $operations the last line
     * @@param $operationInputs the actual numbers in int or string
     */
    public static function getSum($operations, $operationInputs): int
    {
        $sum = 0;
        for ($i = 0; $i < \count($operations); $i++) {
            $op = $operations[$i];
            $initial = Calculator::getIdentity($op);
            $accumulator = Calculator::getAccumulator($op);
            $inputs = $operationInputs[$i];
            $result = \array_reduce($inputs, $accumulator, $initial);
            $sum += $result;
        }
        return $sum;
    }

    private static function getIdentity(string $op): int
    {
        if ($op === "+") {
            return 0;
        }
        if ($op === "*") {
            return 1;
        }
        throw new \Exception("Unexpected operator $op");
    }
    private static function getAccumulator(string $op): callable
    {
        if ($op === "+") {
            return fn($carry, $item) => $carry + (int) $item;
        }
        if ($op === "*") {
            return fn($carry, $item) => $carry * (int) $item;
        }
        throw new \Exception("Unexpected operator $op");
    }
}
