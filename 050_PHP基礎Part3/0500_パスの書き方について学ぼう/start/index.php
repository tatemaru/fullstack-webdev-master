<?php
/**
 * パスの書き方について学ぼう
 * 
 * - マジック定数 __DIR__, __FILE__を使ってみよう
 * - dirnameの使い方を学ぼう
 * - 相対パスと絶対パス
 * - \と/は使い分けよう
 * - "と'は使い分けよう
 */
// echo dirname(__FILE__, 2);
echo __DIR__ . "/../start/sub/file2.php";
require __DIR__ . '/../start/sub/file2.php';
