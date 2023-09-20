<?php
$cars =[
    [
        'maker' => 'トヨタ',
        'model' => 'プリウス',
        'year'  => 2004,
        'price' => 1100000,
    ],
    [
        'maker' => 'ホンダ',
        'model' => 'アコード',
        'year'  => 2009,
        'price' => 2200000,

    ],
    [
        'maker' => '日産',
        'model' => 'マーチ',
        'year'  => 2003,
        'price' => 580000,
    ],
    [
        'maker' => 'ポルシェ',
        'model' => 'ボクスター',
        'year'  => 2008,
        'price' => 4500000,
    ],    [
        'maker' => 'BMW',
        'model' => 'Z8',
        'year'  => 2007,
        'price' => 12500000,
    ],
];

echo '<table>';
foreach ($cars as $car) {
  echo '<tr>';
  echo '<td>' . $car['maker'] . '</td>';
  echo '<td>' . $car['model'] . '</td>';
  echo '<td>' . $car['year'] . '</td>';
  echo '<td>' . $car['price'] . '</td>';
  echo '</tr>';
}
echo '</table>';

echo '<pre>';
print_r($cars);
echo '</pre>';