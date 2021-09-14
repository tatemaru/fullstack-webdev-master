<?php
$a = 0;

function fn1(){
    $b = 1;
}
function fn2(){
    $b = 2;
    // var_dump($_SERVER);
    if(true){
        $b =2;
    }
    // global $a;
    echo $b;
}

fn2();