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

function makeExpressions(array $firstArray, array $secondArray, string $operator): array
{
   $expressions = [];
   $numberOfExpressions = 3;
   for ($i = 0; $i < $numberOfExpressions; $i++) {
       $expressions[] = "{$firstArray[$i]} {$operator} {$secondArray[$i]}";
   }
   return $expressions;
}

function getCorrectAnswers(array $firstArray, array $secondArray, string $operator): array
{
   $answers = [];
   $numberOfExpressions = 3;
   for ($i = 0; $i < $numberOfExpressions; $i++) {
       $answers[] = calc($firstArray[$i], $secondArray[$i], $operator);
   }
   return $answers;
}

function chooseOperator(): string
{
    $operators = ['+', '-', '*'];
    shuffle($operators);
    return $operators[0];
}

function runCalcGame()
{
    $rules = "What is the result of the expression?";
    $firstArray = generateNumbers();
    $secondArray = generateNumbers();
    $operator = chooseOperator();
    $expressions = makeExpressions($firstArray, $secondArray, $operator);
    $correctAnswers = getCorrectAnswers($firstArray, $secondArray, $operator);
    runGame($rules, $correctAnswers, $expressions);
}
