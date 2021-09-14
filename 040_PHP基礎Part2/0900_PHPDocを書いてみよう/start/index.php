<?php

/**
 * 税率計算のための関数を記述すためのファイル
 * 
 * @author CodeMafia
 * @since 1.0.0
 */

/**
 * 税込金額を取得する関数
 * 
 * @param int $base_price 価格
 * @param float $tax_rate 税率
 * 
 * @return int 税込金額
 * @see http://example.com/
 */
function with_tax($base_price, $tax_rate = 0.1) {
    $sum_price = $base_price + ($base_price * $tax_rate);
    $sum_price = round($sum_price);
    return $sum_price;
}

with_tax(1000, 0.08);