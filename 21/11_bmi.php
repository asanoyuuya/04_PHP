<?php

$HEIGHT = 175;
$WEIGHT = 70;

$bmi = $WEIGHT / (($HEIGHT * 0.01) ** 2);
$proper = ($HEIGHT * 0.01) ** 2 * 22;

$weightDifference = $WEIGHT - $proper;

echo '身長は' . $HEIGHT . 'cmで体重は' . $WEIGHT . 'kgのときのBMI値は' . number_format($bmi, 2) . 'で、<br>';
echo '適正体重の' . ($weightDifference > 0 ? '+' : '') . number_format($weightDifference, 2) . 'kgです。';