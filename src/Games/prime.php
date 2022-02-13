<?php

namespace Brain\Games\Prime;

use function Brain\Games\Cli\runGame;
use function Brain\Games\Cli\generateNumbers;

function isPrime(int $number): bool
{
    $isPrime = true;
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            $isPrime = false;
            break;
        }
    }
    return $isPrime;
}
