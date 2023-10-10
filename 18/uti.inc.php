<?php

/**
 * 引数にファイル名を受けて
 * 3桁の連番付きの文字列を返す
 *
 * @param string|null $filename
 * @return string|null
 */
function serialNum(?string $filename): ?string
{
    if (empty($filename)) return null;
    $id = file_get_contents('num.dat');
    $id++;
    file_put_contents('num.dat', $id);
    return sprintf('%03d', $id) . '_' . $filename;
}