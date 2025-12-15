<?php

namespace AOC\Challenge7p2;

class QuantumTachyonManifold
{
    public int $timelines = 1;
    private int $width;
    private int $height;
    private $memory = [];
    /**
     * @@param $layers the configuration from top layer of the manifold
     */
    public function __construct(private readonly array $layers)
    {
        $this->width = \strlen($layers[0]);
        $this->height = \count($layers);
    }
    public function on(): void
    {
        $channelTachyonIsOn = \strpos($this->layers[0], "S");
        $this->timelines += $this->startTimeline(1, $channelTachyonIsOn, [
            $channelTachyonIsOn,
        ]);
    }
    private function startTimeline(
        int $startLayer,
        int $tachyonChannel,
        array $route,
    ): int {
        $moreTimelines = 0;
        if ($startLayer >= $this->height) {
            // $this->printRoute($route);
            return $moreTimelines;
        }
        if (array_key_exists("$startLayer#$tachyonChannel", $this->memory)) {
            return $this->memory["$startLayer#$tachyonChannel"];
        }
        $layer = $this->layers[$startLayer];
        if ($layer[$tachyonChannel] === "^") {
            $moreTimelines += 1;
            $moreTimelines += $this->startTimeline(
                $startLayer + 1,
                $tachyonChannel - 1,
                [...$route, $tachyonChannel - 1],
            );
            $moreTimelines += $this->startTimeline(
                $startLayer + 1,
                $tachyonChannel + 1,
                [...$route, $tachyonChannel + 1],
            );
        } else {
            $moreTimelines += $this->startTimeline(
                $startLayer + 1,
                $tachyonChannel,
                [...$route, $tachyonChannel],
            );
        }
        $this->memory["$startLayer#$tachyonChannel"] = $moreTimelines;
        return $moreTimelines;
    }
    private function printRoute($route)
    {
        echo chr(27) . "[H" . chr(27) . "[J";
        foreach ($route as $point) {
            echo str_repeat(".", $point);
            echo "|";
            echo str_repeat(".", $this->width - 1 - $point);
            echo "\n";
        }
    }
}
