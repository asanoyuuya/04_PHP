<?php
$profile = [
  [
    'name'     => '山田太郎',
    'birthday' => '1990-03-15',
    'address'  => '東京'
  ],
  [
    'name'     => '田中花子',
    'birthday' => '1998-08-28',
    'address'  => '大阪'
  ]
];
foreach ($profile as $value) {
  echo '名前は' . $value['name'] . 'で、
  誕生日は' . $value['birthday'] . 'で、
  住所は' . $value['address'] . 'です。<br>';
}