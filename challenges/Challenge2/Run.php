<?php

namespace AOC\Challenge2;

use AOC\Runnable;

class Run extends Runnable
{
    public function run(array $input): void
    {
        $sum = 0;
        $input = explode(",", $input[0]);
        foreach ($input as $range) {
            $this->logger->debug("Range is $range\n", [$range]);
            [$start, $end] = explode("-", $range);
            $start = (int) $start;
            $end = (int) $end;
            for ($i = $start; $i <= $end; $i += 1) {
                if (Validator::isInvalid($i)) {
                    $sum += $i;
                    $this->logger->debug("invalid: $i");
                }
            }
        }
        $this->logger->info("Answer is $sum\n");
    }
}
