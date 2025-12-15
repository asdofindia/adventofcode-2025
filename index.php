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

function get_input_file($challenge, $test) {
    $expected = "inputs/input$challenge";
    if ($test) {
        $expected = "$expected-test";
    }
    if (file_exists($expected)) {
        return $expected;
    }
    return null;
}

$inputFile = get_input_file($challenge, $test);
if ($inputFile === null) {
    $p1 = \explode("p", $challenge)[0];
    $inputFile = get_input_file($p1, $test);
}
if ($test) {
    $logger->pushHandler(new StreamHandler("php://stdout", Logger::DEBUG));
} else {
    $logger->pushHandler(new StreamHandler("php://stdout", Logger::INFO));
}

$input = file($inputFile, FILE_IGNORE_NEW_LINES);

$className = "\\AOC\\Challenge$challenge\\Run";

$solution = new $className($logger);

$solution->run($input, $test);
