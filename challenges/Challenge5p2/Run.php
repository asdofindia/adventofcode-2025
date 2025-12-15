<?php

namespace AOC\Challenge5p2;

use AOC\Runnable;

class Run extends Runnable
{
    public function run(array $input): void
    {
        $freshRanges = [];
        $ingredients = [];
        $part = "range";
        for ($i = 0; $i < \count($input); $i++) {
            $row = $input[$i];
            if ($row === "") {
                $part = "ingredient";
                continue;
            }
            if ($part === "range") {
                $freshRanges[] = \array_map(
                    fn($v): int => (int) $v,
                    \explode("-", $row),
                );
            } else {
                $ingredients[] = (int) $row;
            }
        }
        usort($freshRanges, fn($a, $b) => $a[0] <=> $b[0]);
        $segmentedRanges = [];
        $i = 0;
        $currRange = $freshRanges[$i];
        $i += 1;
        while (true) {
            if ($i >= \count($freshRanges)) {
                $segmentedRanges[] = $currRange;
                break;
            }
            $nextRange = $freshRanges[$i];
            if ($currRange[1] < $nextRange[0]) {
                $segmentedRanges[] = $currRange;
                $currRange = $nextRange;
                $i++;
                continue;
            }
            if ($nextRange[1] >= $currRange[1]) {
                $currRange[1] = $nextRange[1];
                $i++;
                continue;
            }
            $i++;
        }
        $fresh = 0;
        foreach ($segmentedRanges as $range) {
            $fresh += $range[1] - $range[0] + 1;
        }

        $this->logger->info("The answer is $fresh\n");
    }
}
