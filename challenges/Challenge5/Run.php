<?php

namespace AOC\Challenge5;

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
        $fresh = 0;
        foreach ($ingredients as $ingId) {
            $i = 0;
            while ($i < \count($freshRanges)) {
                if (
                    $ingId >= $freshRanges[$i][0] &&
                    $ingId <= $freshRanges[$i][1]
                ) {
                    $fresh += 1;
                    break;
                }
                $i++;
            }
        }

        $this->logger->info("The answer is $fresh\n");
    }
}
