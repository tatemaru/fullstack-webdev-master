<?php
$array = [
    ['table', 1000],
    ['chair', 100],
    ['chair', 100],
    ['chair', 100],
    ['bed', 10000],
];

// $array[1][1] = 500;
// array_shift($array);
// array_pop($array);
array_splice($array, 2, 2);

foreach($array as $value){
    // echo "{$value[0]}は{$value[1]}円です";
    var_dump($value);
}
