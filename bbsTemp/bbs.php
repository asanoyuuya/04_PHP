<?php declare(strict_types=1);

require_once(dirname(__FILE__) . '/db.inc.php');
require_once(dirname(__FILE__) . '/util.inc.php');


try {
	$pdo     = dbConnect();
	$name    = '';
	$message = '';
	
	if (!empty($_POST)) {
		$isValidated = true;
		$name        = $_POST['name'];
		$message     = $_POST['message'];

		if ($name === '' || preg_match('/^(\s|　)+$/u', $name)) {
			$nameError   = 'なまえを入力してください';
			$isValidated = false;
		} elseif (mb_strlen($name, 'utf8') > 10) {
			$nameError   = 'なまえは10文字以内にしてください';
			$isValidated = false;
		}

		if ($message === '' || preg_match('/^(\s|　)+$/u', $message)) {
			$messageError = 'メッセージを入力してください';
			$isValidated  = false;
		}

		if ($isValidated == true) {
			$stmt = $pdo->prepare(
				'INSERT INTO posts (name, message, created_at) VALUES (:name, :message, NOW())'
			);

			$stmt->bindValue(':name', $name, PDO::PARAM_STR);
			$stmt->bindValue(':message', $message, PDO::PARAM_STR);
			$stmt->execute();

			$name    = '';
			$message = '';
		}
	}
	
	$stmt    = $pdo->prepare('SELECT * FROM posts ORDER BY created_at DESC LIMIT 10');
	$stmt->execute();
	$posts = $stmt->fetchAll();

} catch (PDOException $e) {
	header('Content-Type: text/plain; charset=UTF-8', true, 500);
	exit($e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8" />
	<title>ひとこと掲示板</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<h1 class="logo"><span class="fa-stack">
		<i class="fa fa-square fa-stack-2x"></i>
		<i class="fa fa-list-alt fa-stack-1x fa-inverse"></i>
	</span> ひとこと掲示板</h1>
	<main class="main">
		<h2 class="formtitle">メッセージの投稿</h2>
		<form action="" method="post" novalidate>
		<p>なまえ：</p>
			<?php if (isset($nameError)): ?>
					<p class="error"><?= $nameError ?></p>
			<?php endif; ?>
			<p><input type="text" name="name" value="<?= h($name) ?>"></p>
			
			<?php if (isset($messageError)): ?>
					<p class="error"><?= $messageError ?></p>
			<?php endif; ?>
			<p><textarea name="message" cols="30" rows="12"></textarea></p>
			<p><input type="submit" value="送信"></p>
		</form>
		<article class="post">
			<?php foreach ($posts as $post): ?>
					<h2 class="title"><i class="fa fa-user-circle-o"></i> <?= $post['name'] ?> <span class="date">[<i class="fa fa-calendar"></i><?php $d = new DateTime($post['created_at']) ?> <?= $d->format('Y年m月d日') ?>]</span></h2>
					<p class="message"><?= $post['message'] ?></p>
			<?php endforeach; ?>
		</article>
	</main>
</body>

</html>