<?php
$goods = [
    [
        'name' => '和風柄レターセット',
        'price' => 980
    ],
    [
        'name' => '毛筆ペン(細字)',
        'price' => 240
    ],
];

echo '<pre>';
print_r($goods);
echo '</pre>';

$count1 = $_POST['count1'];
$count2 = $_POST['count2'];
$subTotal1 = $count1 * $goods[0]['price'];
$subTotal2 = $count2 * $goods[1]['price'];
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
                <td>
                    <?= $goods[0]['name'] ?>
                </td>
                <td>
                    <?= $goods[0]['price'] ?>
                </td>
                <td>
                    <input type="text" name="count1"
                        value="<?= htmlspecialchars($count1, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>">
                </td>
                <td>
                    <?= $subTotal1 ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= $goods[1]['name'] ?>
                </td>
                <td>
                    <?= $goods[1]['price'] ?>
                </td>
                <td>
                    <input type="text" name="count2"
                        value="<?= htmlspecialchars($count2, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>">
                </td>
                <td>
                    <?= $subTotal2 ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">
                    合計
                </th>
                <td>
                    <?= $totalPrice ?>
                </td>
            </tr>
        </table>
        <p><input type="submit" value="更新"></p>
    </form>

</body>

</html>