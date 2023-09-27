<?php

$name = '';
if (!empty($_POST)) {
    $name = $_POST['name'];
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
    if (empty($string)) return null;
    return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>挨拶</title>
</head>
<body>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h2>
            <?= h($name) ?>さん、おはようございます！
        </h2>
    <?php endif; ?>
    <form action="" method="post" novalidate>
        <input type="text"  name="name" value="<?= h($name) ?>"></input>
        <p><input type="submit" value="送信"></p>
    </form>
</body>
</html>