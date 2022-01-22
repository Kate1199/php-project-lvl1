<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function greetPlayer()
{
    $welcomeMessage = "Welcome to the Brain Games!";
    $askForName = "May I have your name?";
    $greet = "Hello, %s";

    line($welcomeMessage);
    $name = prompt($askForName);
    line($greet, $name);
}
