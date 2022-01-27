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

function getCorrectAnswers(array $numbers): array
{
    $answers = [];
    foreach ($numbers as $number) {
        $answers[] = isPrime($number) ? "yes" : "no";
    }
    return $answers;
}

function runPrimeGame()
{
    $rules = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $expressions = generateNumbers();
    $correctAnswers = getCorrectAnswers($expressions);
    runGame($rules, $correctAnswers, $expressions);
}
