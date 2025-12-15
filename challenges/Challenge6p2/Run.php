<?php

namespace AOC\Challenge6p2;

use AOC\Challenge6\Calculator;
use AOC\Runnable;

class Run extends Runnable
{
    public function run(array $input): void
    {
        $operations = \preg_split("/\s+/", \trim(\array_last($input)));
        $operationInputs = MathGrid::getInputs(\array_slice($input, 0, \count($input) - 1));
        $this->logger->debug("", $operationInputs);
        $sum = Calculator::getSum($operations, $operationInputs);
        $this->logger->info("The answer is $sum\n");
    }
}
