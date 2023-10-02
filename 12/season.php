<?php declare(strict_types=1);
require_once(dirname(__FILE__) . '/Chart.php');

$spring = '';
$summer = '';
$fall = '';
$winter = '';
if (!empty($_POST)) {
    $spring = $_POST['spring'];
    $summer = $_POST['summer'];
    $fall = $_POST['fall'];
    $winter = $_POST['winter'];

    $c = new chart();
    $c->setTitle('好きな季節アンケート結果');
    $c->addData([$spring, $summer, $fall, $winter], 'season');
    $c->setXLabel(['春', '夏', '秋', '冬']);
    $c->setYAxisName('（人）');
    $c->setSize(300, 200);
}

/**
 * XSS対策のサニタイジングと参照名省略
 *
 * @param string | null string
 * @return string | null
 *
 */
function h(?string $string): ?string
{
    if (empty($string))
        return null;
    return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>集計結果入力</title>
</head>

<body>
    <h1>集計結果入力</h1>
    <form action="" method="post" novalidate>
        <table>
            <tr>
                <td>春</td>
                <td><input type="text" name='spring' size="4" maxlength="4" value=<?= h($spring) ?>>人</td>
            </tr>
            <tr>
                <td>夏</td>
                <td><input type="text" name='summer' size="4" maxlength="4" value=<?= h($summer) ?>>人</td>
            </tr>
            <tr>
                <td>秋</td>
                <td><input type="text" name='fall' size="4" maxlength="4" value=<?= h($fall) ?>>人</td>
            </tr>
            <tr>
                <td>冬</td>
                <td><input type="text" name='winter' size="4" maxlength="4" value=<?= h($winter) ?>>人</td>
            </tr>
        </table>
        <p><input type="submit" value="グラフ生成"></p>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>
            <?php $c->printBarChart() ?>
        </p>
    <?php endif; ?>
</body>

</html>