<?php

$fruits = ['リンゴ', 'バナナ','ぶどう'];

echo $fruits[0] . '<br>';
echo $fruits[1] . '<br>';
echo $fruits[2];

echo '<pre>';
var_dump ($fruits);
echo '</pre>';

echo '<pre>';
print_r($fruits);
echo '</pre>';

$fruits = ['リンゴ' =>100 ,
 'バナナ' => 200,
 'ぶどう' => 300
];