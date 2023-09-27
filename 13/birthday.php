<?php declare(strict_types=1);
$d1 = new DateTime();
$d2 = new DateTime('1998-2-28');
$interval = $d1->diff($d2);

echo $d->format('Y年m月d日') . '歳';

// 「1998年2月28日」の現在の年齢をワンラインで「歳」という単位を付けて表示する。