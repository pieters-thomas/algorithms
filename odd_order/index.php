<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$a = array(10, 9, 8, 7, 6, 5, 4, 3, 2, 1);
$b = [];

foreach ($a as $index => $value) {
    if ($value % 2 !== 0) {
        continue;
    }
    $b[] = $a[$index];
    $a[$index] = 'x';
}
asort($b);

foreach ($a as $index => $value) {
    if ($value === 'x') {
        $a[$index] = array_shift($b);
    }
}
var_dump($a);

/*
# Task
Given an array of integers, sort the integers from small to big but ONLY for the even numbers.
The uneven numbers should stay in the same place.

## Examples

[6, 4, 2] -> 2, 4, 6
[3, 2, 1] -> 3, 2, 1
[6, 4, 3] -> 4, 6, 3
[10, 5, 11, 8, 6, 3, 9] -> 6, 5, 11, 8, 10, 3, 9
[10, 9, 8, 7, 6, 5, 4, 3, 2, 1] -> 2, 9, 4, 7, 6, 5, 8, 3, 10, 1
*/