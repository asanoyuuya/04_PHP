<?php

$lang = 'ja';

if (!empty($_POST)) {
    $lang = $_POST['lang'];

} elseif (isset($_COOKIE['lang']))  {
    $lang = $_COOKIE['lang'];
}

setcookie('lang', $lang, time() + 86400 * 30 );

if ($lang == 'en'){
    $message = 'Welcome!';
} elseif ($lang == 'ja') {
    $message = 'ようこそ！';
} elseif ($lang == 'kr') {
    $message = '오신 것을 환영합니다!';
} elseif ($lang == 'cn') {
    $message = '欢迎光临!';
} elseif ($lang == 'it') {
    $message = 'Benvenuto!';
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $message ?></title>
</head>
<body>
    <h1><?= $message ?></h1>
    <form action="" method="post" novalidate>
        <select name="lang">
            <option <?= $lang == 'en' ? 'selected': '' ?> value="en">英語</option>
            <option <?= $lang == 'ja' ? 'selected': '' ?> value="ja">日本語</option>
            <option <?= $lang == 'kr' ? 'selected': '' ?> value="kr">韓国語</option>
            <option <?= $lang == 'cn' ? 'selected': '' ?> value="cn">中国語</option>
            <option <?= $lang == 'it' ? 'selected': '' ?> value="it">イタリア語</option>
        </select>
        <p><input type="submit" value="送信"></p>
        
    </form>
</body>
</html>