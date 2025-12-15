<?php

namespace AOC\Challenge3;

class BatteryBank
{
    private $bank;
    private $highest;

    public function __construct(string $bank)
    {
        $this->bank = $bank;
    }
    public function getLargestJoltage(): int
    {
        $batterySize = 2;
        // get an array starting at index 0 with length $batterySize and all values null
        $candidates = \array_fill(0, $batterySize, null); // = [null, null] for $batterySize = 2
        $batteryMustStartAtLeastAtIndex = \strlen($this->bank) - $batterySize;
        for ($i = 0; $i <= $batteryMustStartAtLeastAtIndex; $i++) {
            for ($j = 0; $j < $batterySize; $j++) {
                $currentMax = $candidates[$j];
                $joltage = (int) $this->bank[$i + $j];
                if ($currentMax === null || $joltage > $currentMax) {
                    // reset candiate to this one
                    $candidates[$j] = $joltage;
                    // invalidate the rest
                    $candidates = \array_pad(
                        \array_slice($candidates, 0, $j + 1),
                        $batterySize,
                        null,
                    );
                }
            }
        }
        $maxJoltage = "";
        foreach ($candidates as $candidate) {
            $maxJoltage = "$maxJoltage$candidate";
        }
        return (int) $maxJoltage;
    }
}
