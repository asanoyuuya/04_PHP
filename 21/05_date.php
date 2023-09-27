<?php

$d = new DateTime('-1 month');
$weekday = ['日', '月', '火', '水', '木', '金', '土'];
$w = $weekday[$d->format('w')];

echo '1ヶ月前の日付は' . $d->format('Y年m月d日') . '(' . $w . ')です。';