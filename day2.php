<?php

//--- Day 2: Dive! ---
$commands = file_get_contents(__DIR__.'/inputs/day2');
$commands_array = explode(PHP_EOL, $commands);

$positions = [
    'horizontal' => 0,
    'depth' => 0
];

foreach($commands_array as $command) {

    $instructions = explode(" ", $command);
    $direction = $instructions[0];
    $steps = $instructions[1];

    switch($direction) {
        case 'forward':
            $positions['horizontal'] += $steps;
            break;
        case 'down':
            $positions['depth'] += $steps;
            break;
        case 'up':
            $positions['depth'] -= $steps;
            break;
    }
}

echo $positions['horizontal'] * $positions['depth'];