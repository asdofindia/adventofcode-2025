<?php

namespace AOC\Challenge1;

use AOC\Runnable;

class Run extends Runnable
{
    public function run(array $input, bool $test = false): void
    {
        $dial = new Dial();
        $totalZeroes = 0;

        foreach ($input as $line) {
            $pointed = $dial->act($line);
            $this->logger->debug("The dial is rotated $line to point at $pointed\n");
            if ($pointed === 0) {
                $totalZeroes += 1;
            }
        }
        $this->logger->info("The password is $totalZeroes\n");
    }
}
