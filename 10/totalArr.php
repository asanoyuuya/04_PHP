<?php
$total = 0;
$priceList = [298, 348, 198, 680, 98, 980, 498, 640];
for ($i = 0; $i < count($priceList); $i++) {
    $total += $priceList[$i] * 1.1;
}
echo $total . '円';