<?php

namespace Brain\Games\Calc;

use function Brain\Games\Cli\runGame;
use function Brain\Games\Cli\generateNumbers;

function calc(int $num1, int $num2, string $operator): int
{
    $result = 0;
    switch ($operator) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
    }
    return $result;
}

function makeExpressions(array $firstArray, array $secondArray, array $operators): array
{
    $expressions = [];
    $numberOfExpressions = 3;
    for ($i = 0; $i < $numberOfExpressions; $i++) {
        $expressions[] = "{$firstArray[$i]} {$operators[$i]} {$secondArray[$i]}";
    }
    return $expressions;
}

function getCorrectAnswers(array $firstArray, array $secondArray, array $operators): array
{
    $answers = [];
    $numberOfExpressions = 3;
    for ($i = 0; $i < $numberOfExpressions; $i++) {
        $answers[] = calc($firstArray[$i], $secondArray[$i], $operators[$i]);
    }
    return $answers;
}

function chooseOperators(): array
{
    $numberOfOperators = 3;
    $operators = ['+', '-', '*'];
    $operatorsForExpressions = [];
    for ($i = 0; $i < $numberOfOperators; $i++) {
        shuffle($operators);
        $operatorsForExpressions[] = $operators[0];
    }
    return $operatorsForExpressions;
}

function runCalcGame()
{
    $rules = "What is the result of the expression?";
    $firstArray = generateNumbers();
    $secondArray = generateNumbers();
    $operators = chooseOperators();
    $expressions = makeExpressions($firstArray, $secondArray, $operators);
    $correctAnswers = getCorrectAnswers($firstArray, $secondArray, $operators);
    runGame($rules, $correctAnswers, $expressions);
}
