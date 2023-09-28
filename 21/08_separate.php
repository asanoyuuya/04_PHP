<?php

$arrNums = [42, 7, 35, 54, 71, 32, 13, 8, 21, 45];
$even = '偶数：';
$odd = '奇数：';

foreach ($arrNums as $num) {
    if ($num % 2 == 0) {
        $even = $even . $num . ' ';
    } else {
        $odd = $odd . $num . ' ';
    }
}

echo $even . '<br>' . $odd;