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
            echo "The dial is rotated $line to point at $pointed\n";
            if ($pointed === 0) {
                $totalZeroes += 1;
            }
        }
        echo "The password is $totalZeroes\n";
    }
}
