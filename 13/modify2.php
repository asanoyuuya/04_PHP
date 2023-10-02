<?php
$d1 = new DateTime('last day of February 2025');
$d2 = new DateTime('-10 days');
$interval = $d1->diff($d2);
$days   = $interval->days;
$invert = $interval->invert;

if ($days == 0) {
    echo '同じ日付です';
} elseif ($invert == 1) {
    echo getJpDate($d1) . 'の方が「' . $days . '日分」' . getJpDate($d2) . 'より新しいです';
} else {
    echo getJpDate($d2) . 'の方が「' . $days . '日分」' . getJpDate($d1) . 'より新しいです';
}

/**
 * DateTimeをインスタンスを受けて和暦を返す
 *
 * @param DateTime $obj
 * @return string
 */
function getJpDate(DateTime $obj): string
{
    $weeks = ['日', '月', '火', '水', '木', '金', '土'];
    return $obj->format('Y年m月d日') . '(' . $weeks[$obj->format('w')] . ')';
}