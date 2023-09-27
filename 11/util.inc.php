<?php declare(strict_types=1);
/**
 * 4桁の年数を受け取り和暦に変換
 *
 * @param null|string|integer $seireki
 * @return string
 */
function getWareki(null|string|int $seireki): string
{
    if (!is_numeric($seireki) or $seireki < 1868) {
        return '未対応';
    } elseif ($seireki < 1912) {
        $year = $seireki - 1867;
        return '明治' . ($year == 1 ? '元' : $year) . '年';
    } elseif ($seireki < 1926) {
        $year = $seireki - 1911;
        return '大正' . ($year == 1 ? '元' : $year) . '年';
    } elseif ($seireki < 1989) {
        $year = $seireki - 1925;
        return '昭和' . ($year == 1 ? '元' : $year) . '年';
    } elseif ($seireki < 2019) {
        $year = $seireki - 1988;
        return '平成' . ($year == 1 ? '元' : $year) . '年';
    } else {
        $year = $seireki - 2018;
        return '令和' . ($year == 1 ? '元' : $year) . '年';
    }
}

/**
 * XSS対策のサニタイジングと参照名省略
 *
 * @param string | null string
 * @return string | null
 *
 */
function h(?string $string): ?string
{
    if (empty($string))
        return null;
    return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}