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
    /**
     * @param $action Action in the AOC format
     * @param $notifyZero callback to get zero count
     */
    public function act(string $action, ?callable $notifyZero = null): int
    {
        $steps = (int) \substr($action, 1);
        if ($action[0] === "L") {
            $zeroesCrossed = $this->decrement($steps);
            if ($notifyZero) {
                $notifyZero($zeroesCrossed);
            }
        } elseif ($action[0] === "R") {
            $zeroesCrossed = $this->increment($steps);
            if ($notifyZero) {
                $notifyZero($zeroesCrossed);
            }
        } else {
            throw new \Exception("Unknown action $action");
        }
        return $this->pointed;
    }
    private function decrement(int $steps): int
    {
        $crossed = 0;
        $this->pointed -= $steps;
        while ($this->pointed < 0) {
            $crossed += 1;
            $this->pointed += $this->total;
        }
        return $crossed;
    }
    private function increment(int $steps): int
    {
        $crossed = 0;
        $this->pointed = $steps + $this->pointed;
        while ($this->pointed >= $this->total) {
            $crossed += 1;
            $this->pointed -= $this->total;
        }
        return $crossed;
    }
}
