<?php
const UP_PATH = 'uploades/';
if (!empty($_FILES)) {
    if ($_FILES['upfile']['error'] == UPLOAD_ERR_OK) {
        if (!move_uploaded_file($_FILES['upfile']['tmp_name'], UP_PATH . mb_convert_encoding(basename($_FILES['upfile']['name']), 'cp932', 'utf8'))) {
            $messageError = 'ファイルのアップロードに失敗しました';
        }
    } elseif ($_FILES['upfile']['error'] == UPLOAD_ERR_NO_FILE) {
    } else {
        $messageError = 'ファイルのアップロードに失敗しました';
    }
}

$files = glob('uploades/*.png');

$replace = ['uploades/', '.png'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>画像ギャラリー</title>
    <style>
  .wrapper {
    max-width: 1000px;
    margin: auto;
  }
  table {
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid #ddd;
    padding: 5px;
    text-align: center;
  }
  th {
    background-color: #eee;
  }
  img {
    display: block;
    padding: 3px;
    border: 1px solid #aaa;
    box-shadow: 0 0 8px #ccc;
  }
  img:hover {
    box-shadow: 0 0 8px #ccc, 0 0 12px #669;
  }
  span {
    font-size: 12px;
    font-weight: bold;
  }
  span::after {
    content: " ]";
  }
  span::before {
    content: "[ ";
  }
  .error {
    color: #990000;
  }
</style>
</head>
<body>
    <div class="wrapper">
    <h1>画像ギャラリー</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <p>ファイル名：<input type="file" name="upfile" accept="image/*">
        <input type="submit" value="送信"></p>
        <?php if(isset($messageError)):?>
            <p class="error"><?= $messageError ?></p>
        <?php endif; ?>
      </form>
        
        <table>
            <tr>
                <th colspan="5">画像一覧</th>
            </tr>
            <tr>
                <?php if(0 == count($files)): ?>
                    <td>アップロードされたファイルはありません。</td>
                <?php else: ?>
                    <?php for($i = 0; $i < count($files); $i++): ?>
                        <?php $file = str_replace($replace, '', $files[$i]);
                              $file = mb_convert_encoding($file, 'utf8', 'cp932');
                        ?>
                    <td><img src="<?=  UP_PATH . $file ?>.png" alt="<?= $file ?>" width="200"><span><?= $file ?></span></td>
                    
                    <?= $i % 5 == 4 ? '</tr><tr>' : '' ?>
                    <?php endfor; ?>
                <?php endif; ?>
            </tr>
        </table>
    </div>
</body>
</html>