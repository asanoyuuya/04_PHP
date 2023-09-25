<?php

$t = 29;
$h = 70;

function getDi($t, $h){
    return  0.81 * $t + 0.01 * $h * (0.99 * $t - 14.3) + 46.3;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>不快指数計算</title>
</head>
<body>
<p>気温<?=$t?>℃、湿度<?=$h?>%の時の不快指数は<?= getDi($t = 24, $h = 60) ?>です。</p>
</body>
</html>