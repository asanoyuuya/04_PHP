<?php

$score = '';
if (!empty($_POST)) {
    $score = $_POST['score'];
}

if (!is_numeric($score)) {
    $result = '数値を入力してください';
} elseif ($score < 50) {
    $result = '不可';
} elseif ($score < 65) {
    $result = '可';
} elseif ($score == 70) {
    $result = '70点';
} elseif ($score < 80) {
    $result = '良';
} else {
    $result = '優';
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
    <title>点数</title>
</head>

<body>
    <h1>テスト結果判定</h1>
    <form action="" method="post" novalidate>
        <input type="text" name="score" size="3" maxlength="3" value="<?= h($score) ?>">
        <p><input type="submit" value="採点"></p>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h2>
            結果：<?= h($result) ?>
        </h2>
    <?php endif; ?>
</body>

</html>