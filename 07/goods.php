<?php
$goodList = ['テレビ', 'パソコン', '携帯電話','冷蔵庫', '洗濯機'];

$id = $_GET['id'];

$itemName = $goodList[$id];

?>


<p> <?=$itemName?> が選択されました。</p>

<p><a href="lists.php">一覧ページに戻る</a></a></p>