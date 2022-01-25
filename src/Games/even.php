<?php

namespace Brain\Games\Cli;

use function Brain\Games\Cli\runGame;

function generateNumbers(): array
{
    $numbers = [];
    $minNumber = 0;
    $maxNumber = 100;
    $numberAmount = 3;
    for ($i = 0; $i < $numberAmount; $i++) {
        $numbers[] = rand($minNumber, $maxNumber);
    }
    return $numbers;
}

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
