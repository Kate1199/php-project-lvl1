<?php

namespace Brain\Games\Even;

use function Brain\Games\Cli\runGame;
use function Brain\Games\Cli\generateNumbers;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function getCorrectAnswers(array $expresssions): array
{
    $correctAnswers = [];
    foreach ($expresssions as $expresssion) {
        $correctAnswers[] = isEven($expresssion) ? "yes" : "no";
    }
    return $correctAnswers;
}

function runEvenGame()
{
    $rules = "Answer \"yes\" if the number is even, otherwise answer \"no\"";
    $expresssions = generateNumbers();
    $correctAnswers = getCorrectAnswers($expresssions);
    runGame($rules, $correctAnswers, $expresssions);
}
