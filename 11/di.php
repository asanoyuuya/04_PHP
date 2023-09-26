<?php

$t = 29;
$h = 70;

/**
 *  温度と湿度を指定すると不快指数の数値を返す
 *
 * @param integer $t
 * @param integer $h
 * @return string
 */
function getDi(?int $t = 24,?int $h = 60):?float
{
    if (empty($t) || empty($h)) return null;
    return 0.81 * $t + 0.01 * $h * (0.99 * $t - 14.3) + 46.3;
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
    <p>気温
        <?= $t ?>℃、湿度
        <?= $h ?>%の時の不快指数は
        <?= getDi() ?>です。
    </p>
</body>

</html>