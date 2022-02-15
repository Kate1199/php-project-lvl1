<?php

namespace Brain\Games\Calc;

function calc(int $num1, int $num2, string $operator)
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
        default:
            $result = "undefined operator";
            break;
    }
    return $result;
}
function makeExpression(int $firstNum, int $secondNum, string $operator): string
{
    return "{$firstNum} {$operator} {$secondNum}";
}

function chooseOperator(): string
{
    $operators = ["+", "-", "*"];
    $index = array_rand($operators);
    return $operators[$index];
}
