<?php

function validAge(string $name = '名無し', int $age = 20): string
{
    
    if ($age >= 20) {
        return $name . 'さんの年齢は' . $age . '歳で成人です。<br>';
    } else {
        return $name . 'さんの年齢は' . $age . '歳で未成人です。<br>';

    }
}

echo validAge('太郎', 21);
echo validAge('次郎', 18);
echo validAge('三郎',);
echo validAge();