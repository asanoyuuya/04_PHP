<?php

$score = 80;
if (!is_numeric($socore)) {
    echo '数値を入力してください';
} elseif ($score < 0 or 100 < $score) {
    echo 'a';
} elseif ($score == 100) {
    echo '満点おめでとう！';
} elseif ($score >= 80) {
    echo '素晴らしいです！';
} elseif ($score >= 60) {
    echo '合格です';
} elseif ($score < 60) {
    echo '不合格です';
} else {
    echo '不正な点数です';
}

// $score = 93;
// if (0 <= $score < 101) {
// echo '不当な点数です';
// } elseif ($score >= 0) {
// echo '合格です';
// } elseif ($score < 60) {
// echo '不合格です';
// }

// $score = 93;
// if ($score >= 101) {
// echo '不当な点数です';
// } elseif ($score < 0) {
// echo '不正な点数です';
// } elseif ($score == 100) {
// echo '満点おめでとう！';
// } elseif ($score >= 80) {
// echo '素晴らしいです！';
// } elseif ($score >= 60) {
// echo '合格です';
// } else {
// echo '不合格です';
// }

// $score = 69;
// if ($score == 100) {
// echo '満点おめでとう！';
// } elseif ($score >= 80) {
// echo '素晴らしいです！';
// } elseif ($score >= 60) {
// echo '合格です';
// } else {
// echo '不合格です';
// }