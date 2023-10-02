<?php

$distance = 1300;

function getPriceTaxi(?int $distance): ?int
{
    $price = 410;
    if ($distance <= 1000) {
        return 410;
    } elseif ($distance += 237) {
        return $price + 80;
    }
}

echo $distance . 'm乗った場合の料金は' . getPriceTaxi($distance) . '円です。';