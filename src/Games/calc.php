<?php

namespace Brain\Games\Cli;

use function Brain\Games\Cli\runGame;

function generateExpressions(): array
{
    $numberOfExpressions = 3;
    $minNumber = 0;
    $maxNumber = 100;
    $expressions = [];

    $operators = ['+', '-', '*'];

    for ($i = 0; $i < $numberOfExpressions; $i++) {
        $num1 = rand($minNumber, $maxNumber);
        $num2 = rand($minNumber, $maxNumber);
        shuffle($operators);
        $expressions[] = "{$num1} {$operators[0]} {$num2}";
    }
    return $expressions;
}

function getAnswers(array $expressions): array
{
    $operatorIndex = 1;
    $indexNum1 = 0;
    $indexNum2 = 2;
    $answer = [];
    foreach ($expressions as $expression) {
        $expressionArray = explode(' ', $expression);
        if ($expressionArray[$operatorIndex] === '+') {
            $answers[] = $expressionArray[$indexNum1] + $expressionArray[$indexNum2];
        } elseif ($expressionArray[$operatorIndex] === '-') {
            $answers[] = $expressionArray[$indexNum1] - $expressionArray[$indexNum2];
        } elseif ($expressionArray[$operatorIndex] === '*') {
            $answers[] = $expressionArray[$indexNum1] * $expressionArray[$indexNum2];
        }
    }
    return $answers;
}

function runCalcGame()
{
    $rules = "What is the result of the expression?";
    $expressions = generateExpressions();
    $correctAnswers = getAnswers($expressions);
    runGame($rules, $correctAnswers, $expressions);
}
