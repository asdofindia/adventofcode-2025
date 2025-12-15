<?php

namespace AOC\Challenge6p2;

class MathGrid
{
    /**
     * @@param $input list of inputs
     */
    public static function getInputs(array $input): array
    {
        $maxLength = 0;
        for ($i = 0; $i < \count($input); $i++) {
            $len = \strlen($input[$i]);
            if ($len > $maxLength) {
                $maxLength = $len;
            }
        }
        $outputs = [];
        $output = [];
        for ($i = $maxLength - 1; $i >= 0; $i--) {
            $col = "";
            for ($j = 0; $j < \count($input); $j++) {
                if ($i < \strlen($input[$j])) {
                    $val = $input[$j][$i];
                    $col = "$col$val";
                }
            }
            $col = \trim($col);
            if ($col === "") {
                $outputs[] = $output;
                $output = [];
            } else {
                $output[] = $col;
            }
        }
        $outputs[] = $output;
        return \array_reverse($outputs);
    }
}
