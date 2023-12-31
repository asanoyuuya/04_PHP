<?php

$arrNums = [1, 7, 11];

/**
 * 配列の平均値
 *
 * @param array $arrNums
 * @return integer
 */
function getAvg(array $arrNums): int
{
    $totalNums = 0;
    foreach ($arrNums as $nums) {
        $totalNums += $nums;
    }
    return round($totalNums / count($arrNums));
}

echo '平均値は' . getAvg($arrNums) . 'です。';