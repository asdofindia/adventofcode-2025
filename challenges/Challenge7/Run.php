<?php

namespace AOC\Challenge7;

use AOC\Runnable;

class Run extends Runnable
{
    public function run(array $input): void
    {
        $manifold = new TachyonManifold($input);
        $manifold->on();
        $splits = $manifold->splits;
        $this->logger->info("The answer is $splits\n");
    }
}
