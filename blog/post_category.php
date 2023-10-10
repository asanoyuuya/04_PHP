<?php declare(strict_types=1);

require_once(dirname(__FILE__) . '/db.inc.php');
require_once(dirname(__FILE__) . '/util.inc.php');

try {
	$pdo         = dbConnect();
	$categoryName = '';
	$isValidated = false;
    
	if (!empty($_POST)) {
		$categoryName = $_POST['categoryName'];
		$isValidated = true;

		if ($categoryName === '' || preg_match('/^(\s|　)+$/u', $categoryName)) {
			$categoryNameError  = 'カテゴリーを入力してください';
			$isValidated = false;
		} elseif (mb_strlen($categoryName, 'utf8') > 10) {
			$categoryError = 'タイトルは10文字以内で入力してください';
			$isValidated  = false;
		}

		if ($isValidated == true) {
			$stmt = $pdo->prepare(
				'INSERT INTO categories (name) VALUES (:name)'
			);
			$stmt->bindValue(':name', $categoryName, PDO::PARAM_STR);
			$stmt->execute();
        }
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
	<title>Taro's Blog | カテゴリーの投稿</title>
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<header class="header">
			<h1>カテゴリーの投稿</h1>
		</header>

		<section class="postform">
			<p class="right"><a href="articles.php">記事の一覧に戻る</a></p>
			<?php if ($isValidated == true): ?>
				<p>以下の内容で記事を保存しました。</p>
				<table>
					<tr>
						<th>カテゴリ</th>
						<td><?= nl2br(h($categoryName)) ?></td>
					</tr>
				</table>
			<?php else: ?>
				<p>カテゴリーを入力し、送信ボタンを押してください。</p>
				<table>
						<form action="" method="post" novalidate>
						<tr>
							<th>カテゴリ名</th>
							<td>
                                <input type="text" name="categoryName" value="<?= h($categoryName) ?>">
                                <?php if(isset($categoryError)): ?>
                                <span class="error"><?= $categoryNameError ?></span>
                                <?php endif; ?>
							</td>
						</tr>
						</table>
						<p><input type="submit" value="送信"></p>
					</form>
			<?php endif; ?>
			<p><a href="post_category.php">続けて投稿する</a></p>
	</div>
</body>

</html>


