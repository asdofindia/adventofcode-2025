<?php

namespace AOC;

use Monolog\Logger;

require __DIR__ . "/vendor/autoload.php";

if (\count($argv) < 2) {
    die("Pass the challenge number\n");
}

$challenge = $argv[1];

$test = false;
if (\count($argv) > 2) {
    if ($argv[2] === "test") {
        $test = true;
    }
}

$inputFile = "inputs/input$challenge";
if ($test) {
    $inputFile = "$inputFile-test";
}

$input = file($inputFile, FILE_IGNORE_NEW_LINES);

$className = "\\AOC\\Challenge$challenge\\Run";

$logger = new Logger('aoc_logger');
$solution = new $className($logger);

$solution->run($input, $test);
