<?php
$books =[
    [
        'title'   => 'PHPの絵本',
        'author'  => 'アンク',
        'price'   => 1680,
        'compant' => '翔泳社',
        'date'    => '2017-04',
        'point'   => 32
    ],
    [
        'title'   => 'よくわかるPHPの教科書',
        'author'  => 'たにぐちまこと',
        'price'   => 2480,
        'compant' => 'マイナビ出版',
        'date'    => '2018-04',
        'point'   => 48
    ],
    [
        'title'   => 'CakePHP3入門',
        'author'  => '掌田津耶乃',
        'price'   => 2800,
        'compant' => '秀和システム',
        'date'    => '2017-01',
        'point'   => 56
    ],
];

$books [2]['price'] = 1980;

echo '<table>';
foreach ($books as $book) {
  echo '<tr>';
  echo '<td>' . $book['title'] . '</td>';
  echo '<td>' . $book['author'] . '</td>';
  echo '<td>' . $book['price'] . '</td>';
  echo '<td>' . $book['compant'] . '</td>';
  echo '<td>' . $book['date'] . '</td>';
  echo '<td>' . $book['point'] . '</td>';
  echo '</tr>';
}
echo '</table>';

echo '<pre>';
print_r($books);
echo '</pre>';