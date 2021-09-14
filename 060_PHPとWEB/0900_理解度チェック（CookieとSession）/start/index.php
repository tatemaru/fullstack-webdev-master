<?php
/**
 * SessionとCookieの理解度チェック
 * 
 * index.phpに訪問するたびに訪問回数が
 * １ずつ増える処理を実装してみてください。
 * Session、Cookieの二つのパターンで実装してみましょう。
 * 
 * １回目
 * 訪問回数は 1 回目です。
 * 
 * ２回目
 * 訪問回数は 2 回目です。
 * 
 */

 
// Sessionを使った場合
// session_start();
// if(empty($_SESSION['VISIT_COUNT'])){
//     $_SESSION['VISIT_COUNT'] = 1;
//     echo '訪問回数は' .  $_SESSION['VISIT_COUNT'] . '回目です';
// } else {
//     $_SESSION['VISIT_COUNT']++;
//     echo '訪問回数は' .  $_SESSION['VISIT_COUNT'] . '回目です';
// }

// Cookieを使った場合
// if(empty($_COOKIE['VISIT_COUNT'])){
//     setcookie('VISIT_COUNT', 1);
//     echo '訪問回数は' .  1 . '回目です';
// } else {
//     $i = $_COOKIE['VISIT_COUNT'] + 1;
//     setcookie('VISIT_COUNT', $i);
//     echo '訪問回数は' .  $i . '回目です';
// }

session_start();
?>
<?php
if(isset($_SESSION['VISIT_COUNT'])){
    $_SESSION['VISIT_COUNT']++;
} else {
    $_SESSION['VISIT_COUNT'] = 1;
}
?>
<div>訪問回数は<?php echo $_SESSION['VISIT_COUNT']; ?>回目です。</div>

<?php
$visit_count = 1;
if(isset($_COOKIE['VISIT_COUNT'])){
    $visit_count = $_COOKIE['VISIT_COUNT'] + 1;
}
setcookie('VISIT_COUNT', $visit_count);
?>
<div>訪問回数は<?php echo $visit_count; ?>回目です。</div>