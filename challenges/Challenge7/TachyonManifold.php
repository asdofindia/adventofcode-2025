<?php

namespace AOC\Challenge7;

class TachyonManifold
{
    public int $splits = 0;
    private array $litLayers = [];
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
        $channelTachyonStatus = \array_fill(0, $this->width, false);
        for ($i = 0; $i < $this->height; $i++) {
            $layer = $this->layers[$i];
            for ($c = 0; $c < $this->width; $c++) {
                if ($layer[$c] === "S") {
                    $channelTachyonStatus[$c] = true;
                }
                if ($layer[$c] === "^" && $channelTachyonStatus[$c]) {
                    $this->splits += 1;
                    $channelTachyonStatus[$c - 1] = true;
                    $channelTachyonStatus[$c] = false;
                    $channelTachyonStatus[$c + 1] = true;
                }
            }
        }
    }
}
