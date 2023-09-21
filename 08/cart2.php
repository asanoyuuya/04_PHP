<?php
$goods1 = [
    [
        'name'  => '和風柄レターセット',
        'price' => 980
    ],
];

$goods2 = [
    [
        'name'  => '毛筆ペン(細字)',
        'price' => 240
    ],
];

$count1 = $_POST['count1'];
$count2 = $_POST['count2'];
$subTotal1 = $count1 * $goods1['price'];
$subTotal2 = $count2 * $goods2['price'];
$totalPrice = $subTotal1 + $subTotal2;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ショッピングカート</title>
    <style>
    table {
        border-collapse: collapse;
        width: 600px;
    }

    th,
    td {
        border: 1px solid #666666;
        padding: 4px;
    }

    th {
        background-color: #dddddd;
    }
    </style>
</head>

<body>
    <h1>ショッピングカート</h1>
    <form action="" method="post">
        <table>
            <tr>
                <th>商品名</th>
                <th>単価</th>
                <th>数量</th>
                <th>小計</th>
            </tr>
            <tr>
            <?php
            foreach ($goods1 as $good1) {
                    echo '<td>' . $good1['name'] . '</td>';
                    echo '<td>' . $good1['price'] . '円</td>';
                }
                ?>
                <td>
                    <input type="text" name="count1" value="">
                </td>
                <td>
                    <?=$subTotal1?>
                </td>
            </tr>
            <?php
            foreach ($goods2 as $good2) {
                    echo '<td>' . $good2['name'] . '</td>';
                    echo '<td>' . $good2['price'] . '円</td>';
                }
                ?>
                <td>
                    <input type="text" name="count1" value="">
                </td>
                <td>
                    <?=$subTotal2?>
                </td>
            </tr>
            <tr>
                <th colspan = "3">
                    合計
                </th>
                <td>
                <?=$totalPrice?>
                </td>
            </tr>
        </table>
        <p><input type="submit" value="更新"></p>
    </form>

</body>

</html>