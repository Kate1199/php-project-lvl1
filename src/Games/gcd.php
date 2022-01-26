<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Cli\runGame;
use function Brain\Games\Cli\generateNumbers;

function countGcd(int $num1, int $num2): int
{
    $minDivider = 1;
    $gcd = $num1 > $num2 ? $num2 : $num1;
    for ($i = $gcd; $i >= $minDivider; $i--) {
        if ($num1 % $i === 0 && $num2 % $i === 0) {
            $gcd = $i;
            break;
        }
    }
    return $gcd;
}

function getCorrectAnswers(array $firstArray, array $secondArray): array
{
    $amountOfNumbers = 3;
    $answers = [];
    for ($i = 0; $i < $amountOfNumbers; $i++) {
        $answers[] = countGcd($firstArray[$i], $secondArray[$i]);
    }
    return $answers;
}

function makeExpressions(array $firstArray, array $secondArray): array
{
    $expressions = [];

    $amountOfExpressions = 3;
    for ($i = 0; $i < $amountOfExpressions; $i++) {
        $expressions[] = "{$firstArray[$i]} {$secondArray[$i]}";
    }
    return $expressions;
}

function runGcdGame()
{
    $rules = "Find the greatest common divisor of given numbers.";
    $firstArray = generateNumbers();
    $secondArray = generateNumbers();
    $expressions = makeExpressions($firstArray, $secondArray);
    $correctAnwers = getCorrectAnswers($firstArray, $secondArray);
    runGame($rules, $correctAnwers, $expressions);
}
