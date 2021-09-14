<?php

$a = 1;

function fn1(&$a){
 $a++;
 echo $a;
}

fn1($a);
echo $a;