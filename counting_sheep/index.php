<?php

//"sfmvwsultc\n". "iclufhcduq\n". "psasheepdz\n". "nhewhelhyk\n". "xdepxpvhoc\n". "cotopbrjds\n". "fltsowndnl\n". "eojhnhwlls\n". "hqgeffwtbi\n". "bawepgzxob\n";
//"xxxxx\n". "sheep\n". "xxxxx\n". "xxxxx\n"."xxxxx";
//"shxxx\n". "xeexx\n". "xxpxx\n". "xxxxx\n";
//"sheep\n". "htwlm\n". "eryte\n". "exxfv\n". "pvata\n";


function checkUp(array $father, array $array, string $string, array &$receiver)
{
    if ($father[$array[0] - 1][$array[1]] === $string) {
        $receiver[] = [$array[0] - 1, $array[1], 'up'];
    }
}
function checkDown(array $father, array $array, string $string, array &$receiver)
{
    if ($father[$array[0] + 1][$array[1]] === $string) {
        $receiver[] = [$array[0] + 1, $array[1], 'down'];
    }
}
function checkLeft(array $father, array $array, string $string, array &$receiver)
{
    if ($father[$array[0]][$array[1] - 1] === $string) {
        $receiver[] = [$array[0], $array[1] - 1, 'left'];
    }
}
function checkRight(array $father, array $array, string $string, array &$receiver)
{
    if ($father[$array[0]][$array[1] + 1] === $string) {
        $receiver[] = [$array[0], $array[1] + 1, 'right'];
    }
}
function checkNext(array $father, array $array, string $string, array &$receiver)
{
    switch ($array[3]) {
        case 'down':
            checkDown($father, $array, $string, $receiver);
            checkLeft($father, $array, $string, $receiver);
            checkRight($father, $array, $string, $receiver);
            break;
        case 'up':
            checkUp($father, $array, $string, $receiver);
            checkLeft($father, $array, $string, $receiver);
            checkRight($father, $array, $string, $receiver);
            break;
        case 'left':
            checkUp($father, $array, $string, $receiver);
            checkDown($father, $array, $string, $receiver);
            checkLeft($father, $array, $string, $receiver);
            break;
        case 'right':
            checkUp($father, $array, $string, $receiver);
            checkDown($father, $array, $string, $receiver);
            checkRight($father, $array, $string, $receiver);
            break;
        default:
            checkUp($father, $array, $string, $receiver);
            checkDown($father, $array, $string, $receiver);
            checkLeft($father, $array, $string, $receiver);
            checkRight($father, $array, $string, $receiver);
    }
}

$string = "sfmvwsultc\n". "iclufhcduq\n". "psasheepdz\n". "nhewhelhyk\n". "xdepxpvhoc\n". "cotopbrjds\n". "fltsowndnl\n". "eojhnhwlls\n". "hqgeffwtbi\n". "bawepgzxob\n";

$parsed = (explode("\n", $string));
$field = [];
$first = [];
$second = [];
$third = [];
$fourth = [];
$fifth = [];

foreach ($parsed as $x => $y) {
    $field[] = str_split($y);
}

foreach ($field as $x => $array) {
    foreach ($array as $y => $value) {
        if ($value === 's') {
            $first[] = [$x, $y];
        }
    }
}

foreach ($first as $check) {
    checkNext($field, $check, 'h', $second);
}

foreach ($second as $check) {
    checkNext($field, $check, 'e', $third);
}

foreach ($third as $check) {
    checkNext($field, $check, 'e', $fourth);
}

foreach ($fourth as $check) {
    checkNext($field, $check, 'p', $fifth);
}

echo count($fifth );