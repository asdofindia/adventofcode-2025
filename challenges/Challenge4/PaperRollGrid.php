<?php

namespace AOC\Challenge4;

class PaperRollGrid
{
    private $grid;
    private $width;
    private $height;
    /**
     * @param $grid input
     */
    public function __construct(array $grid)
    {
        $this->width = \strlen($grid[0]);
        $this->height = \count($grid);
        $this->grid = $grid;
    }
    public function getEasyCount(): int
    {
        $count = 0;
        for ($i = 0; $i < $this->height; $i++) {
            for ($j = 0; $j < $this->width; $j++) {
                if ($this->grid[$i][$j] !== "@") {
                    continue;
                }
                $topRow = $i === 0;
                $bottomRow = $i === $this->height - 1;
                $adjacent = 0;
                if (!$topRow) {
                    $adjacent += $this->checkRow($this->grid[$i - 1], $j);
                }
                $adjacent += $this->checkRow($this->grid[$i], $j);
                $adjacent -= 1; // because we don't want to count ourselves
                if (!$bottomRow) {
                    $adjacent += $this->checkRow($this->grid[$i + 1], $j);
                }

                if ($adjacent < 4) {
                    $count += 1;
                }
            }
        }
        return $count;
    }
    private function checkRow(string $row, int $j): int
    {
        $adjacent = 0;
        $leftEdge = $j === 0;
        $rightEdge = $j === $this->width - 1;
        if (!$leftEdge) {
            if ($row[$j - 1] === "@") {
                $adjacent += 1;
            }
        }
        if ($row[$j] === "@") {
            $adjacent += 1;
        }
        if (!$rightEdge) {
            if ($row[$j + 1] === "@") {
                $adjacent += 1;
            }
        }
        return $adjacent;
    }
}
