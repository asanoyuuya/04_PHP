<?php

$d1 = new DateTime('last day of February 2025');

$d2 = new DateTime('-10 days');

$interval = $d1->diff($d2);
$invert = $interval->invert;

$days = $interval->days;

if ($days == 0) {
    echo '日付は同じです';
} else {
    if ($invert == 1) {
        echo $d1->format('Y年m月d日') .'(曜日)の方が「' . $days . '日分」' . $d2->format('Y年m月d日') . '(曜日)より新しいです';
    } else {
        echo $d2->format('Y年m月d日') .'(曜日)の方が「' . $days . '日分」' . $d1->format('Y年m月d日') . '(曜日)より新しいです';
    }
}