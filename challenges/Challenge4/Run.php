<?php

namespace AOC\Challenge4;

use AOC\Runnable;

class Run extends Runnable
{
    public function run(array $input): void
    {
        $grid = new PaperRollGrid($input);
        $easy = $grid->getEasyCount();
        $this->logger->info("Answer is $easy\n");
    }
}
