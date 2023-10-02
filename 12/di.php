<?php
$t = 30;
$h = 70;

class Di
{
    private $t;
    private $h;

    /**
     * セッターとして値を保持する
     *
     * @param mixed $t
     * @param mixed $h
     */
    public function __construct(mixed $t = null, mixed $h = 60)
    {
        if (is_null($t) || empty($h)) return null;
        $this->t = $t;
        $this->h = $h;
    }

    /**
     * 温度と湿度を基に不快指数の数値を返す
     *
     * @return float
     */
    public function getDiScore(): float
    {
        return 0.81 * $this->t + 0.01 * $this->h * (0.99 * $this->t - 14.3) + 46.3;
    }

    /**
     * 不快指数の数値を基に体感を返す
     *
     * @return string
     */
    public function getDiResult(): string
    {
        $di = $this->getDiScore();
        if ($di < 55) {
            return '寒い';
        } elseif ($di < 60) {
            return '肌寒い';
        } elseif ($di < 65) {
            return '何も感じない';
        } elseif ($di < 70) {
            return '快い';
        } elseif ($di < 75) {
            return '暑くない';
        } elseif ($di < 80) {
            return 'やや暑い';
        } elseif ($di < 85) {
            return '暑くて汗が出る';
        } else {
            return '暑くてたまらない';
        }
    }
}

$di = new Di($t, $h);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>不快指数計算</title>
</head>

<body>
    <p>気温<?= $t ?>℃、湿度<?= $h ?>%の時の不快指数は<?= $di->getDiScore(); ?>で「<?= $di->getDiResult(); ?>」です。</p>

</html>