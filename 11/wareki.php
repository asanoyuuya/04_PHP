<?php

$seireki = '';
if (!empty($_POST)) {
    $seireki = $_POST['seireki'];
}

include_once(dirname(__FILE__) . '/util.inc.php');

$wareki = getWareki($seireki);

if ($wareki == 1)
{
    return '元';
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>西暦⇒和暦変換</title>
</head>

<body>
    <h1>西暦⇒和暦変換</h1>
    <p>西暦を入力し、「計算」ボタンを押してください。</p>
    <form action="" method="post" novalidate>
        <p>西暦：
            <input type="text" name="seireki" size="4" maxlength="4"
                value="<?= htmlspecialchars($seireki, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>">年
        </p>
        <p><input type="submit" value="計算">
        </p>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>
            西暦
            <?= $seireki ?>年は
            <?= $wareki ?>です。
        </p>
    <?php endif; ?>
</body>

</html>