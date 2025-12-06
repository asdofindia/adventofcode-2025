<?php

namespace AOC\Challenge1;

class Dial
{
    private int $pointed;
    private int $total;

    public int $endedAtZero = 0;
    public int $touchedZero = 0;

    public function __construct(int $maxClick = 99, int $start = 50)
    {
        $this->pointed = $start;
        $this->total = $maxClick + 1;
    }
    /**
     * @param $action Action in the AOC format
     * @param $notifyZero callback to get zero count
     */
    public function act(string $action): int
    {
        $steps = (int) \substr($action, 1);
        $zeroesCrossedHere = 0;
        if ($action[0] === "L") {
            $this->decrement($steps);
        } elseif ($action[0] === "R") {
            $this->increment($steps);
        } else {
            throw new \Exception("Unknown action $action");
        }
        if ($this->pointed === 0) {
            $this->endedAtZero += 1;
        }
        return $this->pointed;
    }
    private function decrement(int $steps): void
    {
        while ($steps) {
            $next =
                $this->pointed === 0 ? $this->total - 1 : $this->pointed - 1;
            if ($next === 0) {
                $this->touchedZero += 1;
            }
            $steps -= 1;
            $this->pointed = $next;
        }
    }
    private function increment(int $steps): void
    {
        while ($steps) {
            $next =
                $this->pointed === $this->total - 1 ? 0 : $this->pointed + 1;
            if ($next === 0) {
                $this->touchedZero += 1;
            }
            $steps -= 1;
            $this->pointed = $next;
        }
    }
}
