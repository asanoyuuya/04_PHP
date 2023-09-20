<?php
$goodList = [
    [
    'id0' => 'テレビ',
    'id1' => 'パソコン',
    'id2' => '携帯電話',
    'id3' => '冷蔵庫',
    'id4' => '洗濯機'
    ],
];

$itemName = $_GET['id'];


?>


<p> <?=$itemName?> が選択されました。</p>

<p><a href="lists.php">一覧ページに戻る</a></a></p>