<?php

$arrNum = [1490, 320, 2160, 1980, 498, 2324, 698, 2218, 1240, 198];
$total = 0;

for ($i = 0; $i < count($arrNum); $i++){
        $index = $arrNum[mt_rand(0, count($arrNum) -1)];
    echo $index . '|'  ;
    $total += $index;
}

echo '<br>' . number_format($total) . '円' ;

