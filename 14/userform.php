<?php

$name = '';
$kana = '';
$phone = '';
$isValidated = false;

if (!empty($_POST)) {
    $isValidated = true;
    $name = $_POST['name'];
    $kana = $_POST['kana'];
    $phone = $_POST['phone'];
    $phone = str_replace('-', '', $phone);

    if ($kana === '' || preg_match('/^(\s|　)+$/u', $kana)) {
        $kanaError = 'フリガナを入力してください';
        $isValidated = false;
    } elseif ($kana === !preg_match('/^[ァ - ヶ]+$/u', $kana)) {
        $kanaError = 'フリガナの形式が異なります。';
        $isValidated = false;
    }

    if ($phone === '' || preg_match('/^(\s|　)+$/u', $phone)) {
        $phoneError = '電話番号を入力してください';
        $isValidated = false;
    } elseif ($phone === !preg_match('/^\d{2,3}-\d{3,4}-\d{4}$/u', $phone)) {
        $phoneError = '電話番号の形式が異なります。';
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
    <title>ユーザー情報入力</title>
    <style>
        table {
            border: 1px solid #666;
            border-collapse: collapse;
            width: 450px;
        }

        th {
            border: 1px solid #666;
            background-color: #ddd;
            padding: 4px;
            width: 100px;
        }

        td {
            border: 1px solid #666;
            padding: 4px;
        }

        .error {
            font-weight: bold;
            color: #f00;
            font-size: 11px;
        }
    </style>
</head>

<body>
    <h1>ユーザ情報入力</h1>
    
    <table>
        <?php if ($isValidated = true): ?>
            <th>氏名</th>
            <td>
                <?= h($name) ?>
            </td>
            <th>フリガナ</th>
            <td>
                <?= h($kana) ?>
            </td>
            <th>電話番号</th>
            <td>
                <?= h($phone) ?>
            </td>
            <p>入力ありがとうございました。</p>
            <p><a href="userform.php"></a>戻る</p>
        </table>
        <?php else: ?>
            <p>下のフォームに記入して送信ボタンを押してください。</p>
        <table>
            <form action="" method="post" novalidate>
                <tr>
                    <th>氏名</th>
                    <td><input type="text" name="name" size="15" value="<?= h($name) ?>"></td>
                    <?php if (isset($error)): ?>
                        <span class="error">
                            <?= $nameError ?>
                        </span>
                    <?php endif; ?>
                </tr>
                <tr>
                    <th>フリガナ</th>
                    <?php $isValidated = false; ?>
                    <td><input type="text" name="kana" size="15" value="<?= h($kana) ?>"></td>
                    <?php if (isset($kanaError)): ?>
                        <span class="error">
                            <?= $kanaError ?>
                        </span>
                    <?php endif; ?>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td><input type="text" name="phone" size="15" value="<?= h($phone) ?>"></td>
                    <?php if (isset($phoneError)): ?>
                        <span class="error">
                            <?= $phoneError ?>
                        </span>
                    <?php endif; ?>
                </tr>

                <p><input type="submit" value="送信"></p>
            </form>
        </table>
    <?php endif; ?>
</body>

</html>