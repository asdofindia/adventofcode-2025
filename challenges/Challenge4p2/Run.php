<?php

namespace AOC\Challenge4p2;

use AOC\Challenge4\PaperRollGrid;
use AOC\Runnable;

class Run extends Runnable
{
    public function run(array $input): void
    {
        $grid = new PaperRollGrid($input);
        $remove = true;
        $total = $grid->getRollsCount();
        $totalRemoved = 0;
        while (true) {
            $removed = $grid->getEasyCount($remove);
            $totalRemoved += $removed;
            if ($removed === 0) {
                break;
            }
        }
        $this->logger->info("Answer is $totalRemoved\n");
    }
}
