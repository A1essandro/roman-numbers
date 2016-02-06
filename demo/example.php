<?php

require_once '../vendor/autoload.php';

use NumberFormatter\InvalidIntException;
use NumberFormatter\InvalidStringException;
use NumberFormatter\RomanNumber;

$n449 = new RomanNumber(449);
echo $n449 . PHP_EOL;

try {
    $invalidRoman = new RomanNumber('InvalidRoman');
} catch (InvalidStringException $e) {
    echo $e->getMessage() . PHP_EOL;
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $invalidRoman = new RomanNumber(-1);
} catch (InvalidIntException $e) {
    echo $e->getMessage() . PHP_EOL;
}

try {
    $invalidRoman = new RomanNumber(null);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . PHP_EOL;
}