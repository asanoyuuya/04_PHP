<?php

$height = 175;
$weigth = 70;

$bmi = $weigth / (($height * 0.01) ** 2);
$proper = ($height * 0.01) ** 2 * 22;

$difference = $weigth - $proper;

echo '身長は' . $height . 'cmで体重は' . $weigth . 'kgのときのBMI値は' . number_format($bmi, 2) . 'で、<br>';
echo '適正体重の' . ($difference > 0 ? '+' : '') . number_format($difference, 2) . 'kgです。';