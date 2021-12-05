<?php

//--- Day 1: Sonar Sweep ---
$numbers = file_get_contents(__DIR__.'/inputs/day1');
$numbers_array = explode(PHP_EOL, $numbers);

$slidingIndex = 3;
$numberJumps = 0;
$slidingIndexNumberJumps = 0;

foreach($numbers_array as $key => $number) {

    $slidingWindowSum = 0;

    if($key > 0) {

        if($number > $numbers_array[$key - 1]) {
            $numberJumps++;
        }

        $prevSlider = 0;
        $nextSlider = 0;

        for($i = 0; $i < $slidingIndex; $i++) {
            $prevSlider += ($numbers_array[$key + ($i - 1)] ?? 0);
            $nextSlider += ($numbers_array[$key + $i] ?? 0);
        }

        if($nextSlider > $prevSlider) {
            $slidingIndexNumberJumps++;
        }
    }
}

echo "Part One: $numberJumps, Part Two: $slidingIndexNumberJumps";



