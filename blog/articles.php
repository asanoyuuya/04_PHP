<?php declare(strict_types=1);
require_once(dirname(__FILE__) . '/db.inc.php');
require_once(dirname(__FILE__) . '/util.inc.php');


try {
    $pdo = dbConnect();
    $categories = $pdo->query('SELECT * FROM categories');
    
    if (!empty($_GET)) {
        $id = $_GET['c'];
        
        $sql = 'SELECT 
        a.id AS a_id, 
        c.name, 
        a.title,
        a.article, 
        a.created_at
        FROM categories c
        JOIN articles a
        ON c.id = a.category_id
        WHERE c.id =' . $id . '';
        
        $stmt = $pdo->prepare($sql);
		$stmt->execute();
        
    } else {

    $sql = 'SELECT 
            a.id AS a_id,  
            c.name, 
            a.title,
            a.article, 
            a.created_at
            FROM categories c
            JOIN articles a
            ON c.id = a.category_id
            ORDER BY a.created_at DESC';
            
    $stmt = $pdo->query($sql);
    }
    $articles = $stmt->fetchAll();
    
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
                        <h3><?= $article['created_at'] ?> | <?= $article['name'] ?> | <a href="delete_article.php?d=<?= h($article['a_id']) ?>">削除</a></h3>
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
        <li><a href="?c=">全件表示</a></li>
        <?php foreach($categories as $categorie): ?>
        <li><a href="?c=<?= $categorie['id'] ?>"><?= $categorie['name'] ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>
    <p class="right"><a href="post_article.php">記事の投稿</a></p>
    <p class="right"><a href="post_category.php">カテゴリーの投稿</a></p>
  </aside>
</div>
</body>
</html>