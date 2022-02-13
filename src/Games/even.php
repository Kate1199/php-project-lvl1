<?php

namespace Brain\Games\Even;

use function Brain\Games\Cli\runGame;
use function Brain\Games\Cli\generateNumbers;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
