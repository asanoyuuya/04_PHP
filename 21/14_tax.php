<?php


$price = 9876;

/**
 * 商品の税込み価格
 *
 * @param integer $price
 * @return integer
 */
function getTaxPrice(int $price):int
{
    return $price * 1.1;
}

echo '税込み価格は' . number_format(getTaxPrice($price), 0) . '円です。';