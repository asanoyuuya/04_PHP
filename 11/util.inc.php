<?php declare(strict_types=1);
/**
 * 4桁の年数を受け取り和暦に変換
 *
 * @param null|string|integer $seireki
 * @return string
 */
function getWareki(null|string|int $seireki):string
{
    if (!is_numeric($seireki) or $seireki < 1868) {
        return '未対応';
    } elseif ( $seireki < 1912) {
        return '明治' . ($seireki - 1867) . '年';
    } elseif ( $seireki < 1926) {
        return '大正' . ($seireki - 1911) . '年';
    } elseif ( $seireki < 1989) {
        return '昭和' . ($seireki - 1925) . '年';
    } elseif ( $seireki < 2019) {
        return '平成' . ($seireki - 1988) . '年';
    } else {
        return '令和' . ($seireki - 2018) . '年';
    }
}


/**
 * XSS対策のサニタイジングと参照名省略
 *
 * @param string | null string
 * @return string | null
 *
 */
function h(?string $seireki): ?string
{
    if (empty($seireki)) return null;
    return htmlspecialchars($seireki, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}