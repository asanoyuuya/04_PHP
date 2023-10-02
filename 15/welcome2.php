<?php declare(strict_types=1);
require_once(dirname(__FILE__) . '/ConvertLang.php');

$lang = 'ja';

$totalLang = [
    [
        'language' => '英語',
        'nation'   => 'en',
        'greeting' => 'Welcome!'
    ],
    [
        'language' => '日本語',
        'nation'   => 'ja',
        'greeting' => 'Welcome!'
    ],
    [
        'language' => '韓国語',
        'nation'   => 'kr',
        'greeting' => '오신 것을 환영합니다!'
    ],
    [
        'language' => '中国語',
        'nation'   => 'cn',
        'greeting' => '欢迎光临!'
    ],
    [
        'language' => 'イタリア語',
        'nation'   => 'it',
        'greeting' => 'Benvenuto!'
    ],
    [
        'language' => 'スペイン語',
        'nation'   => 'es',
        'greeting' => 'Hola!'
    ],
    [
        'language' => 'ロシア語',
        'nation'   => 'ru',
        'greeting' => 'Привет!'
    ]
];


if (!empty($_POST)) {
    $lang = $_POST['lang'];

} elseif (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
}

setcookie('lang', $lang, time() + 86400 * 30);

$message = (new ConvertLang($totalLang))->getConvertLang($lang);


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $message ?>
    </title>
</head>

<body>
    <h1>
        <?= $message ?>
    </h1>
    <form action="" method="post" novalidate>
        <select name="lang">
            <?php for ($i = 0; $i < count($totalLang); $i++): ?>
                <option <?= $lang == $totalLang[$i]['nation'] ? 'selected' : '' ?> value="<?= $totalLang[$i]['nation'] ?>">
                    <?= $totalLang[$i]['language'] ?>
                </option>
            <?php endfor; ?>
        </select>
        <p><input type="submit" value="送信"></p>
    </form>
</body>

</html>