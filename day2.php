<?php

//--- Day 2: Dive! ---

/**
 * @param false $calculateDepthUsingAim
 * @return int[]
 */
function getPositions(bool $calculateDepthUsingAim = false): array {

    $commands = file_get_contents(__DIR__.'/inputs/day2');
    $commands_array = explode(PHP_EOL, $commands);

    $positions = [
        'horizontal' => 0,
        'depth' => 0,
        'aim' => 0
    ];

    foreach($commands_array as $command) {

        $instructions = explode(" ", $command);
        $direction = $instructions[0];
        $steps = $instructions[1];

        switch($direction) {

            case 'forward':
                $positions['horizontal'] += $steps;
                $positions['depth'] += $calculateDepthUsingAim ? ($positions['aim'] * $steps) : 0;
                break;
            case 'down':
                 $positions[$calculateDepthUsingAim ? 'aim' : 'depth'] += $steps;
                break;
            case 'up':
                $positions[$calculateDepthUsingAim ? 'aim' : 'depth'] -= $steps;
                break;
        }
    }

    return $positions;
}

$partOne = getPositions();
$partTwo = getPositions(true);

echo "Part One: " . $partOne['horizontal'] * $partOne['depth'] . ", Part Two: " . $partTwo['horizontal'] * $partTwo['depth'];
