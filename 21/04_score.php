<?php


if ($score < 50) {
    echo '不可';
} elseif ($score < 65) {
    echo '可';
} elseif ($score == 70) {
    echo $score;
} elseif ($score < 80) {
    echo '良';
} else {
    echo '優';
}