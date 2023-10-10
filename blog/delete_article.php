<?php declare(strict_types=1);

require_once(dirname(__FILE__) . '/db.inc.php');
require_once(dirname(__FILE__) . '/util.inc.php');

try {
    $pdo         = dbConnect();
    $isValidated = false;

    if (!empty($_GET)) {
        $id = $_GET['d'];

        $sql = 'SELECT 
            a.id AS a_id, 
            c.name, 
            a.title,
            a.article, 
            a.created_at
            FROM categories c
            JOIN articles a
            ON c.id = a.category_id
            WHERE a.id =' . $id . '';

        $stmt    = $pdo->query($sql);
        $article = $stmt->fetch();

    } elseif (isset($_POST['delete']) == '削除') {
        $d    = $_POST['d'];
            echo '<pre>';
            print_r($d);
            echo '</pre>';
        $sql  ='DELETE FROM articles WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', (int)$d, PDO::PARAM_INT);
        $stmt->execute();
        $isValidated = true;
        
    } else {
        header('Location: articles.php');
    }

} catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taro's Blog | 記事の削除</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>記事の削除</h1>
        </header>
        
        <section class="postform">
            <p class="right"><a href="articles.php">記事の一覧に戻る</a></p>
            <?php if ($isValidated == true): ?>
                    <p>削除を完了しました</p>
            <?php else: ?>
                    <p>内容に問題なければ削除ボタンを押してください</p>
                    <table>
                        <tr>
                            <th>カテゴリ名</th>
                            <td><?= $article['name'] ?></td>
                        </tr>
                        <tr>
                            <th>タイトル</th>
                                <td><?= $article['title'] ?></td>
                            </tr>
                            <tr>
                                <th>記事</th>
                                <td><?= $article['article'] ?></td>
                            </tr>
                    </table>
                        <form action="" method="post" novalidate>
                            <p><input type="hidden" name="d" value="<?= h($article['a_id']) ?>"></p>
                            <p><input type="submit" name="delete" value="削除"></p>
                        </form>
            <?php endif; ?>
            <p><a href="articles.php">一覧に戻る</a></p>
            </section>
    </div>
</body>

</html>
