<?php

$prices = [298, 129, 198, 274, 625, 273, 296, 325, 200, 127, 398];

/**
 * 購入商品価格の配列を指定すると、10%の税込み価格を返す
 *
 * @param [type] $prices
 * @param integer $tax
 * @return float|null
 */
function getPriceInTax(?array $prices, ?int $tax = 8):?int
{
    if (empty($prices)) return null;

    $total = 0;
    foreach ($prices as $price) {
        $total += $price;
    }
    return floor($total * ($tax / 100 + 1));

}

echo number_format(getPriceInTax($prices, 10)) . '円';