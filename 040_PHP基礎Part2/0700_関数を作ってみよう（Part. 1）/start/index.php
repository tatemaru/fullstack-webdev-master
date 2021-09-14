<?php
$numbers = [1,2,3,4];
$numbers2 = [1,2,3];


function sum($nums){
    $sum = 0;
    foreach($nums as $number){
        $sum += $number;
    }
    return $sum; //戻り値
    echo "合計:{$sum}<br>";
}
$result = sum($numbers);
// echo "合計:{$result}<br>";
// sum($numbers2);


