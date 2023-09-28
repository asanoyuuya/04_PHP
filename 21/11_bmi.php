<?php

$HEIGHT = 175;
$WEIGHT = 70;

$BMI = $WEIGHT / (($HEIGHT * 0.01) ** 2);
$PROPER = ($HEIGHT * 0.01) ** 2 * 22;

$DIFFERENCE = $WEIGHT - $PROPER;

echo '身長は' . $HEIGHT . 'cmで体重は' . $WEIGHT . 'kgのときのBMI値は' . number_format($BMI, 2) . 'で、<br>';
echo '適正体重の' . ($DIFFERENCE > 0 ? '+' : '') . number_format($DIFFERENCE, 2) . 'kgです。';