<?php

namespace Brain\Games\Cli;
require_once __DIR__ . '/../src/autoload.php';

use function cli\line;

use function Brain\Games\Calc\chooseOperator;
use function Brain\Games\Calc\makeExpression;
use function Brain\Games\Calc\calc;

use function Brain\Games\Even\isEven;

use function Brain\Games\Gcd\countGcd;

use function Brain\Games\Prime\isPrime;

use function Brain\Games\Progression\makeProgressionExpression;

function showRules(string $game)
{
    switch ($game) {
        case 'calc':
            $rules = "What is the result of the expression?";
            break;
        case 'even':
            $rules = "Answer \"yes\" if the number is even, otherwise answer \"no\"";
            break;
        case 'gcd':
            $rules = "Find the greatest common divisor of given numbers.";
            break;
        case 'prime':
            $rules = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
            break;
        case 'progression':
            $rules = "What number is missing in the progression?";
            break;
        default:
            $rules = "undefined game";
            break;
    }

    line($rules);
}

function doRound(string $game, $num1, $num2): array
{
    switch ($game) {
        case 'calc':
            $operator = chooseOperator();
            $expression = makeExpression($num1, $num2, $operator);
            $result = calc($num1, $num2, $operator);
            break;
        case 'even':
            $expression = $num1;
            $result = isEven($num1) ? 'yes' : 'no';
            break;
        case 'gcd':
            $expression = "{$num1} {$num2}";
            $result = countGcd($num1, $num2);
            break;
        case 'prime':
            $expression = $num1;
            $result = isPrime($num1) ? 'yes' : 'no';
            break;
        case 'progression':
            $step = rand(1, 10);
            $hiddenIndex = rand(0, 4);
            $expression = makeProgressionExpression($num1, $step, $hiddenIndex);
            $result = $step * ($hiddenIndex + 1);
            break;
        default:
            $expression = "undefined game";
            $result = 0;
            break;
    }
    return [$expression, $result];
}
