<?php
session_start();

$name = '';
$pass = '';
$isValidated = false;

if (!empty($_POST)) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    
    if ($_POST["user"] === 'taro' && $_POST['pass'] === 'abcd') {
        $_SESSION['authenticated'] = true;
    }
    
    $userId = $_SESSION['authenticated'];
    
    if ($userId != true) {
        header('Location: login.php');
        exit;
    } else {
        header('Location: member.php');
    }
    
    if ($name === '' || !preg_match('/^taro$/u', $name) || !preg_match('/^abcd$/u', $pass)) {
        $error = 'ユーザIDかパスワードが正しくありません';
        $isValidated = false;
    }
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
    <title>ログイン</title>
    <style>
.error {
  color: #f00;
}
</style>
</head>
<body>
    <h1>ログイン</h1>
    <p>ユーザIDとパスワードを入力し「ログイン」ボタンを押してください</p>
    <?php if (isset($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form action="" method="post" novalidate>
        <table>
            <tr>
                <td>ユーザID</td>
                <td><input type="text" name="user" value="<?= h($name) ?>"></td>
            </tr>
            <tr>
                <td>パスワード</td>
                <td><input type="text" name="pass" value="<?= h($pass) ?>"></td>
            </tr>
        </table>
        <p><input type="submit" value="ログイン"></p>
    </form>
</body>
</html>