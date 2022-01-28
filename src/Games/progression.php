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

function makeExpressions(array $firstNumbers, array $steps, $indexesToHide): array
{
    $numberOfProgressions = 3;
    $expressions = [];
    for ($i = 0; $i < $numberOfProgressions; $i++) {
        $arithmeticProgression = makeArithmeticProgression($firstNumbers[$i], $steps[$i]);
        $arithmeticProgression[$indexesToHide[$i]] = "..";
        $expressions[] = implode(' ', $arithmeticProgression);
    }
    return $expressions;
}

function getCorrectAnswers(array $firstNumbers, array $steps, array $hiddenElemetIndexes): array
{
    $correctAnswers = [];
    $numberOfProgressions = 3;
    for ($i = 0; $i < $numberOfProgressions; $i++) {
        $arithmeticProgression = makeArithmeticProgression($firstNumbers[$i], $steps[$i]);
        $indexOfHiddenElement = $hiddenElemetIndexes[$i];
        $correctAnswers[] = $arithmeticProgression[$indexOfHiddenElement];
    }
    return $correctAnswers;
}

function runProgressionGame()
{
    $rules = "What number is missing in the progression?";

    $minForNumbers = 1;
    $maxForNumbers = 10;
    $firstNumbers = generateNumbers($minForNumbers, $maxForNumbers);
    $steps = generateNumbers($minForNumbers, $maxForNumbers);

    $minForIndex = 0;
    $maxForIndex = 4;
    $hiddenElementsIndexes = generateNumbers($minForIndex, $maxForIndex);

    $expressions = makeExpressions($firstNumbers, $steps, $hiddenElementsIndexes);
    $correctAnswers = getCorrectAnswers($firstNumbers, $steps, $hiddenElementsIndexes);
    runGame($rules, $correctAnswers, $expressions);
}
