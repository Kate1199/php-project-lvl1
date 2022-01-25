<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function greetPlayer(): string
{
    $welcomeMessage = "Welcome to the Brain Games!";
    $askForName = "May I have your name?";
    $greet = "Hello, %s";

    line($welcomeMessage);
    $name = prompt($askForName);
    line($greet, $name);

    return $name;
}

function showRules(string $rules)
{
    line($rules);
}

function askQuestion(string $expression): string
{
    $question = "Question: {$expression}";
    $enteredAnswer = prompt($question);
    line("Your answer: %s", $enteredAnswer);
    return $enteredAnswer;
}

function showAnswer(string $correctAnswer, string $enteredAnswer, string $name): bool
{
    $isCorrect = true;
    $correctAnswerOutput = "Correct!";
    $wrongAnserOutput = "'{$enteredAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.
    Let's try again, {$name}!";

    if ($correctAnswer === $enteredAnswer) {
        line($correctAnswerOutput);
    } else {
        line($wrongAnserOutput);
        $isCorrect = false;
    }
    return $isCorrect;
}

function finishGame(string $name)
{
    $congratulations = "Congratulations, {$name}!";
    line($congratulations);
}

function runGame(string $rules, array $correctAnswers, array $expressions)
{
    $name = greetPlayer();
    $numberOfQuestions = 3;
    $isCorrect = true;

    showRules($rules);
    for ($i = 0; $i < $numberOfQuestions && $isCorrect === true; $i++) {
        $enteredAnswer = askQuestion($expressions[$i]);
        $isCorrect = showAnswer($correctAnswers[$i], $enteredAnswer, $name);
    }

    if ($isCorrect) {
        finishGame($name);
    }
}
