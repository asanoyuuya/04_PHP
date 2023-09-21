<?php
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$result = $num1 + $num2;

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>計算</h1>
    <!-- 以下の数値3箇所に変数出力を行う -->
    <h2><?=$num1?> + <?=$num2?> = <?=$result?></h2>
    <form action="" method="post">
        <input type="text" name="num1" value="<?=$num1?>">+
        <input type="text" name="num2" value="<?=$num2?>">=<?=$result?>
        <p><input type="submit" value="計算"></p>
    </form>
</body>

</html>