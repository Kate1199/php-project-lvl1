<?php

namespace Brain\Games\Prime;

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
