<?php declare(strict_types=1);

require_once(dirname(__FILE__) . '/db.inc.php');
require_once(dirname(__FILE__) . '/util.inc.php');

try {
	$pdo         = dbConnect();
	$category_id = '';
	$title       = '';
	$article     = '';
	$isValidated = false;

	if (!empty($_POST)) {
		$category_id = $_POST['category'];
		$title       = $_POST['title'];
		$article     = $_POST['article'];
		$isValidated = true;

		if ($title === '' || preg_match('/^(\s|　)+$/u', $title)) {
			$titleError  = 'タイトルを入力してください';
			$isValidated = false;
		}

		if ($article === '' || preg_match('/^(\s|　)+$/u', $article)) {
			$articleError = '記事を入力してください';
			$isValidated  = false;
		} elseif (mb_strlen($article, 'utf8') > 100) {
			$articleError = 'タイトルは100文字以内で入力してください';
			$isValidated  = false;
		}

		if ($isValidated == true) {
			$stmt = $pdo->prepare(
				'INSERT INTO articles (category_id, title, article) VALUES (:category_id, :title, :article)'
			);

			$stmt->bindValue(':category_id', (int) $category_id, PDO::PARAM_INT);
			$stmt->bindValue(':title', $title, PDO::PARAM_STR);
			$stmt->bindValue(':article', $article, PDO::PARAM_STR);
			$stmt->execute();

			$sql      = $pdo->query('SELECT * FROM categories WHERE id =' . $category_id . '');
			$c        = $sql->fetch();
			$category = $c['name'];
		}
	}

	$stmt       = $pdo->query('SELECT * FROM categories');
	$categories = $stmt->fetchAll();

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
	<title>Taro's Blog | 記事の投稿</title>
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<header class="header">
			<h1>記事の投稿</h1>
		</header>

		<section class="postform">
			<p class="right"><a href="articles.php">記事の一覧に戻る</a></p>
			<?php if ($isValidated == true): ?>
				<p>以下の内容で記事を保存しました。</p>
				<table>
					<tr>
						<th>カテゴリ</th>
						<td><?= $category ?></td>
					</tr>
					<tr>
						<th>タイトル</th>
						<td><?= h($title) ?></td>
					</tr>
					<tr>
						<th>記事</th>
						<td><?= nl2br(h($article)) ?></td>
					</tr>
				</table>
			<?php else: ?>
				<p>記事を入力し、送信ボタンを押してください。</p>
				<table>
						<form action="" method="post" novalidate>
						<tr>
							<th>カテゴリ</th>
							<td>
								<select name="category">
									<?php foreach ($categories as $categorie): ?>
											<option <?= $category_id == $categorie['id'] ? 'selected' : '' ?> value="<?= $categorie['id'] ?>"><?= $categorie['name'] ?></option>
									<?php endforeach; ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>タイトル</th>
							<td>
								<input type="text" name="title" size="60" value="<?= h($title) ?>">
								<?php if (isset($titleError)): ?>
									<span class="error"><?= $titleError ?></span>
								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<th>記事</th>
							<td>
								<textarea name="article" cols="60" rows="5"></textarea>
								<?php if (isset($articleError)): ?>
									<span class="error"><?= $articleError ?></span>
								<?php endif; ?>
							</td>
							</tr>
						</table>
						<p><input type="submit" value="送信"></p>
					</form>
			<?php endif; ?>
			<p><a href="post_article.php">続けて投稿する</a></p>
	</div>
</body>

</html>