<?php

$height = 175;
$weigth = 70;

echo '身長は' . $height . 'cmで体重は' . $weigth . 'kgのときのBMI値は' . number_format($weigth / (($height * 0.01)**2),2) . 'で、<br>' ;
echo '適正体重は+'. number_format($weigth - (((($height * 0.01)**2) * 22)),2)  . 'kgです。';