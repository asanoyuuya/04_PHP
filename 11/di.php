<?php
$t = 0;
$h = 70;

/**
 * 温度と湿度を指定すると不快指数の数値を返す
 *
 * @param mixed|null $t
 * @param mixed $h
 * @return array|null
 */
function getDi(mixed $t = null, mixed $h = 60): ?array
{
    if (is_null($t) || empty($h)) return null;

    $di = 0.81 * $t + 0.01 * $h * (0.99 * $t - 14.3) + 46.3;
    $diArr['di'] = $di;

    if ($di < 55) {
        $diArr['result'] = '寒い';
    } elseif ($di < 60) {
        $diArr['result'] = '肌寒い';
    } elseif ($di < 65) {
        $diArr['result'] = '何も感じない';
    } elseif ($di < 70) {
        $diArr['result'] = '快い';
    } elseif ($di < 75) {
        $diArr['result'] = '暑くない';
    } elseif ($di < 80) {
        $diArr['result'] = 'やや暑い';
    } elseif ($di < 85) {
        $diArr['result'] = '暑くて汗が出る';
    } else {
        $diArr['result'] = '暑くてたまらない';
    }
    return $diArr;
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
    <p>気温<?= $t ?>℃、湿度<?= $h ?>%の時の不快指数は<?= getDi($t, $h)['di'] ?>で「<?= getDi($t, $h)['result'] ?>」です。</p>

</html>