<?php
$array = [
    // 'key'=> 10,
];
// if(isset($array['key'])) {
//     // $array['key'] *= 10;
// } else {
//     $array['key'] = 1;
// }
$array['key'] = $array['key'] ?? 1;
// $array['key'] = isset($array['key']) ? $array['key'] *= 10 : $array['key'] = 1;
echo $array['key'];