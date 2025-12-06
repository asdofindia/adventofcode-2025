<?php

namespace AOC\Challenge1p2;

use AOC\Challenge1\Dial;
use AOC\Runnable;

class Run extends Runnable
{
    public function run(array $input): void
    {
        $dial = new Dial();

        foreach ($input as $line) {
            $pointed = $dial->act($line);
            $this->logger->debug(
                "The dial is rotated $line to point at $pointed, and total crossed $dial->touchedZero\n",
            );
        }
        $this->logger->info("The password is $dial->touchedZero\n");
    }
}
