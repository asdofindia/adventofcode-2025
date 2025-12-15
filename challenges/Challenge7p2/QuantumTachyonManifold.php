<?php

namespace AOC\Challenge7p2;

class QuantumTachyonManifold
{
    public int $timelines = 1;
    private int $width;
    private int $height;
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
        $this->timelines += $this->startTimeline(1, $channelTachyonIsOn);
    }
    private function startTimeline(int $startLayer, int $tachyonChannel): int
    {
        $moreTimelines = 0;
        if ($startLayer >= $this->height) {
            return $moreTimelines;
        }
        $layer = $this->layers[$startLayer];
        if ($layer[$tachyonChannel] === "^") {
            $moreTimelines += 1;
            $moreTimelines += $this->startTimeline($startLayer + 1, $tachyonChannel - 1);
            $moreTimelines += $this->startTimeline($startLayer + 1, $tachyonChannel + 1);
        } else {
            $moreTimelines += $this->startTimeline($startLayer + 1, $tachyonChannel);
        }
        return $moreTimelines;
    }
}
