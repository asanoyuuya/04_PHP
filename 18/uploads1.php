<?php
const IMGS_PATH = 'images/';
if (!empty($_FILES)) {
    if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
        if (!move_uploaded_file($_FILES['userfile']['tmp_name'], IMGS_PATH . mb_convert_encoding(basename($_FILES['userfile']['name']), 'cp932', 'utf8'))) {
            $message = 'ファイルの移動に失敗しました';
        }
    } elseif ($_FILES['userfile']['error'] == UPLOAD_ERR_NO_FILE) {
        $message = 'ファイルのアップロードは空送信です';
    } else {
        $message = 'ファイルのアップロードはシステムエラーです';
    }
}

$files = glob('images/*.jpg');

$replace = ['images/', '.jpg'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アップロードテスト</title>
</head>
<body>
    <h1>アップロードテスト</h1>
    <?php if (isset($message)): ?>
            <p><?= $message ?></p>
  <?php endif; ?>
  <form action="" method="post" enctype="multipart/form-data">
    <p>ファイル：<input type="file" name="userfile" accept="image/*"></p>
    <p><input type="submit" value="送信"></p>
  </form>
  
  <table>
  <tr><th colspan="4">画像一覧</th></tr>
  <?php if (0 == count($files)): ?>
        <tr><td>ファイルをアップロードしてください</td></tr>
  <?php else: ?>
      <tr>
        <?php for ($i = 0; $i < count($files); $i++): ?> 
              <?php
              $file = str_replace($replace, '', $files[$i]);
              $file = mb_convert_encoding($file, 'utf8', 'cp932');
              ?> 
              <td><img src="<?= IMGS_PATH . $file ?>.jpg" alt="<?= $file ?>" width="200"></td>        
              <?= $i % 4 == 3 ? '</tr><tr>' : '' ?> 
        <?php endfor; ?>
      </tr>
  <?php endif; ?>
</table>
</body>
</html>