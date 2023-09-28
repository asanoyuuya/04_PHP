<?php

$height = 175;
$weigth = 70;

$BMI = $weigth / (($height * 0.01) ** 2);
$PROPER = ($height * 0.01) ** 2 * 22;

$DIFFERENCE = $weigth - $PROPER;

echo '身長は' . $height . 'cmで体重は' . $weigth . 'kgのときのBMI値は' . number_format($BMI, 2) . 'で、<br>';
echo '適正体重の' . ($DIFFERENCE > 0 ? '+' : '') . number_format($DIFFERENCE, 2) . 'kgです。';