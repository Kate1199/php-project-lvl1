<?php

namespace Brain\Games\Gcd;

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

function makeExpression(int $num1, int $num2): string
{
    return "{$num1} {$num2}";
}
