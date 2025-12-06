<?php

namespace AOC\Challenge1;

class Dial
{
    private int $pointed;
    private int $total;
    public function __construct(int $maxClick = 99, int $start = 50)
    {
        $this->pointed = $start;
        $this->total = $maxClick + 1;
    }
    public function act(string $action): int
    {
        $steps = (int) \substr($action, 1);
        if ($action[0] === "L") {
            return $this->decrement($steps);
        } elseif ($action[0] === "R") {
            return $this->increment($steps);
        } else {
            throw new \Exception("Unknown action $action");
        }
    }
    private function decrement(int $steps): int
    {
        $this->pointed -= $steps;
        while ($this->pointed < 0) {
            $this->pointed += $this->total;
        }
        return $this->pointed;
    }
    private function increment(int $steps): int
    {
        $this->pointed = $steps + $this->pointed;
        while ($this->pointed >= $this->total) {
            $this->pointed -= $this->total;
        }
        return $this->pointed;
    }
}
