<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\showRules;
use function Brain\Games\Cli\doRound;

function greetPlayer(): string
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s", $name);

    return $name;
}

function generateNumbers(int $minNumber = 1, int $maxNumber = 100, int $numberAmount = 3): array
{
    $numbers = [];
    for ($i = 0; $i < $numberAmount; $i++) {
        $numbers[] = rand($minNumber, $maxNumber);
    }
    return $numbers;
}

function askQuestion(string $expression): string
{
    $enteredAnswer = prompt("Question: {$expression}");
    line("Your answer: %s", $enteredAnswer);
    return $enteredAnswer;
}

function checkAnswer(string $correctAnswer, string $enteredAnswer, string $name): bool
{
    $isCorrect = true;

    if ($correctAnswer === $enteredAnswer) {
        line("Correct!");
    } else {
        line("'{$enteredAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
        Let's try again, {$name}!");
        $isCorrect = false;
    }
    return $isCorrect;
}

function finishGame(string $name)
{
    line("Congratulations, {$name}!");
}

function run(string $game)
{
    $name = greetPlayer();
    $roundNumber = 3;

    $firstNumbers = generateNumbers();
    $secondNumbers = generateNumbers();
    showRules($game);
    for ($i = 0; $i < $roundNumber; $i++) {
        [$expression, $correctAnswer] = doRound($game, $firstNumbers[$i], $secondNumbers[$i]);
        $enteredAnswer = askQuestion($expression);
        $isCorrect = checkAnswer($correctAnswer, $enteredAnswer, $name);
        if (!$isCorrect) {
            break;
        }
    }

    if ($isCorrect) {
        finishGame($name);
    }
}
