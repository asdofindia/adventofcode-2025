<?php

namespace AOC\Challenge7p2;

use AOC\Runnable;

class Run extends Runnable
{
    public function run(array $input): void
    {
        $manifold = new QuantumTachyonManifold($input);
        $manifold->on();
        $timelines = $manifold->timelines;
        $this->logger->info("The answer is $timelines\n");
    }
}
