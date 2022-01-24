<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function runEvenGame(string $name)
{
    $gameRules = "Answer \"yes\" if the number is even, otherwise answer \"no\"";
    $answer = "Your answer: %s";
    $correct = "Correct!";
    $congratulations = "Congratulations, {$name}!";

    $numberOfQuestions = 3;
    $minNumber = 0;
    $maxNumber = 100;

    line($gameRules);
    for ($i = 0; $i < $numberOfQuestions; $i++) {
        $randNumber = rand($minNumber, $maxNumber);
        $question = "Question: {$randNumber}";

        $enteredAnswer = prompt($question);
        line($answer, $enteredAnswer);
        $correctAnswer = isEven($randNumber) ? "yes" : "no";

        if ($correctAnswer === $enteredAnswer) {
            line($correct);
        } else {
            $wrongAnswer = "\"{$enteredAnswer}\" is wrong answer ;(. Correct answer was \"{$correctAnswer}\".
            Let's try again, {$name}";
            line($wrongAnswer);
            return;
        }
    }
    line($congratulations);
}


function isEven(int $number): bool
{
    return $number % 2 === 0;
}
