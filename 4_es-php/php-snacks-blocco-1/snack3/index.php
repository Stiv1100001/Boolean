<?php

$string = "c,i,n,q,u,e";


$array = explode(',', $string);
$result = [];

$usedKeys = [];
$usedValues = [];

foreach ($array as $char) {
    $key = $array[array_rand($array)];
    $value = $array[array_rand($array)];

    while (in_array($key, $usedKeys)) {
        $key = $array[array_rand($array)];
    }
    while (in_array($value, $usedValues)) {
        $value = $array[array_rand($array)];
    }

    $usedKeys[] = $key;
    $usedValues[] = $value;

    $result[$key] = $value;
}

var_dump($array);
var_dump($result);
