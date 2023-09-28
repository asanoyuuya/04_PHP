<?php
$line = __LINE__;
$file = __FILE__;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <P>ここは<?= $line ?>行目です。<br>パスは<?= $file ?>です。</P>
</body>
</html>