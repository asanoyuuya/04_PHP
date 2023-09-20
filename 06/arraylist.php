<?php

$fruits = ['リンゴ', 'バナナ','ぶどう'];
$arraylist = [
    'リンゴ' => 100,
    'バナナ' => 200,
    'ぶどう' => 300
];

$fruits [] = 'イチゴ';
$arraylist ['イチゴ'] = 400;

$arraylist ['リンゴ'] = 80;

echo $fruits[0] . '<br>';
echo $fruits[1] . '<br>';
echo $fruits[2];

echo '<pre>';
var_dump ($fruits);
echo '</pre>';

echo '<pre>';
print_r($arraylist);
echo '</pre>';