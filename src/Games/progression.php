<?php

namespace Brain\Games\Progression;

use function Brain\Games\Cli\runGame;
use function Brain\Games\Cli\generateNumbers;

function makeArithmeticProgression(int $firstNumber, int $step): array
{
    $sum = 0;
    $arithmeticProgressionLength = 5;
    $arithmeticProgression = [];

    for ($i = 0; $i < $arithmeticProgressionLength; $i++) {
        $sum += $step;
        $arithmeticProgression[] = $sum;
    }
    return $arithmeticProgression;
}

function makeProgressionExpression(int $num, int $step, int $indexToHide): string
{
    $arithmeticProgression = makeArithmeticProgression($num, $step);
    $arithmeticProgression[$indexToHide] = "..";
    return implode(' ', $arithmeticProgression);
}
