<?php


if (!empty($_POST)) {
    $item = $_POST['item'];
}

//三項演算子の式　①条件 ? ②trueの値 : ③falseの値　

?>

<!DOCTYPE html>
<html lang="ja">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    
<body>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>
            <?= $item ?> が選択されました。
        </p>
    <?php endif; ?>
    <form action="" method="post">
        <p>
            <select name="item">
                <option <?php if ($item == 'リンゴ') echo 'selected' ?>>リンゴ</option>
                <option <?php if ($item == 'バナナ') echo 'selected' ?>>バナナ</option>
                <option <?php if ($item == 'ぶどう') echo 'selected' ?>>ぶどう</option>
                <option <?php if ($item == 'メロン') echo 'selected' ?>>メロン</option>
                <option <?php if ($item == 'みかん') echo 'selected' ?>>みかん</option>
                <option <?php if ($item == 'レモン') echo 'selected' ?>>レモン</option>
                <?=$item = '' ? '' : 'バナナ' ; ?>
            </select>
        </p>
        <p><input type="submit" value="送信"></p>
    </form>
</body>

</html>