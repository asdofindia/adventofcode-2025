<?php

namespace AOC\Challenge6;

use AOC\Runnable;

class Run extends Runnable
{
    public function run(array $input): void
    {
        $operations = \preg_split("/\s+/", \trim(\array_last($input)));
        $operationInputs = \array_fill(0, \count($operations), []);
        for ($i = 0; $i < \count($input) - 1; $i++) {
            $inputs = \preg_split("/\s+/", \trim($input[$i]));
            for ($j = 0; $j < \count($inputs); $j++) {
                $operationInputs[$j][$i] = $inputs[$j];
            }
        }

        $sum = 0;
        for ($i = 0; $i < \count($operations); $i++) {
            $op = $operations[$i];
            $initial = $this->getIdentity($op);
            $accumulator = $this->getAccumulator($op);
            $inputs = $operationInputs[$i];
            $result = \array_reduce($inputs, $accumulator, $initial);
            $sum += $result;
        }
        $this->logger->info("The answer is $sum\n");
    }
    private function getIdentity(string $op): int
    {
        if ($op === "+") {
            return 0;
        }
        if ($op === "*") {
            return 1;
        }
        throw new \Exception("Unexpected operator $op");
    }
    private function getAccumulator(string $op)
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
