<?php

$total = 0;
for ($i = 1; $i <= 30; $i++) {
    $total += $i;
}

echo '合計は' . $total . 'です<br>';

$arrNums;
for ($j = 1; $j <= 100; $j++){
    $arrNums[] = $j;
}

$total2 = 0;
foreach ($arrNums as $arrNum){
    $total2 += $arrNum;
}

echo '配列の合計は' . $total2 . 'です';