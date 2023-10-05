<?php declare(strict_types=1);

require_once(dirname(__FILE__) . '/util.inc.php');
require_once(dirname(__FILE__) . '/db.inc.php');


$name    = '';
$age     = '';
$address = '';
$isValidated  = false;
if (!empty($_POST)) {
    $isValidated = true;
    $name    = $_POST['name'];
    $age     = $_POST['age'];
    $address = $_POST['address'];
    $created_at = date('Y-m-d H:i:s');
    
    if ($name === '' || preg_match('/^(\s|　)+$/u', $name)) {
        $isValidated = false;
        $nameError = '※氏名を入力してください';
    } elseif (mb_strlen($name, 'utf8') > 10) {
        $isValidated = false;
        $nameError = '※氏名は10文字以内で入力してください';
    }
    
    if ($age === '' || preg_match('/^(\s|　)+$/u', $age)) {
        $age = null;
    } elseif (!is_numeric($age) || $age < 0) {
        $isValidated = false;
        $ageError = '※年齢は0以上の数値を入力してください';
    }
    
    if ($isValidated == true) {
        
        try{
            $pdo  = dbConnect();
            $stmt = $pdo->prepare(
            'INSERT INTO members (name, age, address, created_at) VALUES (:name, :age, :address, :created_at)'
            );
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':age', (int)$age, PDO::PARAM_INT);
            $stmt->bindValue(':address', $address, PDO::PARAM_STR);
            $stmt->bindValue(':created_at', $created_at, PDO::PARAM_STR);
            $stmt->execute();
            } catch (PDOException $e) {
            header('Content-Type: text/plain; charset=UTF-8', true, 500);
            exit($e->getMessage());
            }
        }
    };
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録システム</title>
    <style>
        .error {
            color: #900;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>会員登録</h1>
    <p><a href="member.php">会員一覧に戻る</a></p>
    <form action="" method="post" novalidate>
        <?php if ($isValidated == true): ?>
            <p>登録完了しました。</p>
            <?php else: ?>
                <p>氏名：<input type="text" name="name" value="<?= h($name) ?>">
            <?php if (isset($nameError)): ?>
                <span class="error"><?= $nameError ?></span></p>
            <?php endif; ?>
                <p>年齢：<input type="text" name="age" value="<?= h($age) ?>">
            <?php if (isset($ageError)) :?>
                <span class="error"><?= $ageError ?></span></p>
            <?php endif;?>
                <p>住所：<input type="text" name="address" value="<?= h($address) ?>"></p>
            <p><input type="submit" value="送信"></p>
        <?php endif;?>
    </form>
</body>
</html>