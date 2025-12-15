<?php

namespace AOC\Challenge3;

use AOC\Runnable;

class Run extends Runnable
{
    public function run(array $input): void
    {
        $sum = 0;
        foreach ($input as $bankConfig) {
            $bank = new BatteryBank($bankConfig);
            $largestJoltage = $bank->getLargestJoltage();
            $this->logger->debug("Max Joltage $largestJoltage for $bankConfig");
            $sum += $largestJoltage;
        }
        $this->logger->info("Answer is $sum\n");
    }
}
