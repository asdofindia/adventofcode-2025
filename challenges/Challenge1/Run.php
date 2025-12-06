<?php

namespace AOC\Challenge1;

use AOC\Runnable;

class Run extends Runnable
{
    public function run(array $input, bool $test = false): void
    {
        $dial = new Dial();
        foreach ($input as $line) {
            $pointed = $dial->act($line);
            $this->logger->debug("The dial is rotated $line to point at $pointed\n");
        }
        $this->logger->info("The password is $dial->endedAtZero\n");
    }
}
