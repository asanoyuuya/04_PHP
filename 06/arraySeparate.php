<?php
$alph = 'A-B-C';

$alphArr = explode('-' , $alph);

$num = array_push($alphArr,'D');

array_push($alphArr, $num . '個');

echo implode (' | ' , $alphArr);