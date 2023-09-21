<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<ul>
<form action="result.php" method="get">
  <p>地域:
    <select name="area">
      <option value="吉祥寺" selected>吉祥寺</option>
      <option value="西荻窪">西荻窪</option>
      <option value="武蔵境">武蔵境</option>
    </select>
  </p>
  <p>間取り:
    <input type="radio" name="layout" value="1K" checked>1K
    <input type="radio" name="layout" value="2DK">2DK
    <input type="radio" name="layout" value="3LDK">3LDK
  </p>
  <p><input type="submit" value="送信"></p>
</form>
</ul>
</body>
</html>



$birthStones = [
    '1'  => 'ガーネット',
    '2'  => 'アメジスト',
    '3'  => 'アクアマリン',
    '4'  => 'ダイヤモンド',
    '5'  => 'エメラルド',
    '6'  => 'パール',
    '7'  => 'ルビー',
    '8'  => 'ペリドット',
    '9'  => 'サファイア',
    '10' => 'オパール',
    '11' => 'トパーズ',
    '12' => 'ターコイズ',
];
