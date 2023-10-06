<?php declare(strict_types=1);
require_once(dirname(__FILE__) . '/db.inc.php');

try {
    $pdo = dbConnect();

    $sql = 'SELECT 
            a.id, 
            c.name, 
            a.title,
            a.article, 
            a.created_at
            FROM categories c
            JOIN articles a
            ON c.id = a.category_id
            ORDER BY a.created_at DESC';

    $articles = $pdo->query($sql)->fetchAll();
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
    <title>Taro's Blog</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <header class="header">
        <h1><a href="articles.php">Taro's Blog</a></h1>
    </header>
    <main class="main">
        <?php foreach ($articles as $article): ?>
            <article class="article">
                <section class="title">
                    <h2><?= $article['title'] ?></h2>
                    <h3><?= $article['created_at'] ?> | <?= $article['name'] ?></h3>
                </section>
            <div class="body">
                <?= $article['article'] ?>      
            </div>
            </article>
        <?php endforeach; ?>
    </main>

  <aside class="side">
    <nav class="sidebox">
      <h2>カテゴリ</h2>
      <ul>
        <li><a href="?c=1">カテゴリ1</a></li>
        <li><a href="?c=2">カテゴリ2</a></li>
      </ul>
    </nav>
    <p class="right"><a href="post_article.php">記事の投稿</a></p>
  </aside>
</div>
</body>
</html>