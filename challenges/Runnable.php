<?php

namespace AOC;

abstract class Runnable {
    protected $logger;

    /**
     * @param $log
     */
    public function __construct($log)
    {
        $this->logger = $log;
    }
    /**
     * @param array $input input string as array from AOC
     * @return void
     */
    abstract public function run(array $input);
}
