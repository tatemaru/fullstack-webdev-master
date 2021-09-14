<?php

namespace lib;

use const lib\sub\TAX_LATE;

const TAX_RATE = 0.1;
    
function with_tax($base_price, $tax_rate = TAX_RATE) {
    $sum_price = $base_price + ($base_price * $tax_rate);
    $sum_price = round($sum_price);
    return $sum_price;
}

\my_echo();
new \GlobalCls();