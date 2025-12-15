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

        $sum = Calculator::getSum($operations, $operationInputs);
        $this->logger->info("The answer is $sum\n");
    }
}
