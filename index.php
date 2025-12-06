<?php

namespace AOC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require __DIR__ . "/vendor/autoload.php";

$logger = new Logger("aoc_logger");

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
    $logger->pushHandler(new StreamHandler("php://stdout", Logger::DEBUG));
} else {
    $logger->pushHandler(new StreamHandler("php://stdout", Logger::INFO));
}

$input = file($inputFile, FILE_IGNORE_NEW_LINES);

$className = "\\AOC\\Challenge$challenge\\Run";

$solution = new $className($logger);

$solution->run($input, $test);
