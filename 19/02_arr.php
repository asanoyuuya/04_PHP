<?php

$recipe = [
    [
        'code'  => 'A0001',
        'name'  => '豚ロース薄切り(50g)',
        'price' => '128'
    ],
    [
        'code'  => 'K0001',
        'name'  => '白菜(3枚)',
        'price' => '240'
    ],
    [
        'code'  => 'A0002',
        'name'  => 'にんじん(1/5本)',
        'price' => '258'
    ],
    [
        'code'  => 'A0003',
        'name'  => '水菜(1株)',
        'price' => '265'
    ],
    [
        'code'  => 'K0002',
        'name'  => 'しめじ(1/2株)',
        'price' => '139'
    ],
    [
        'code'  => 'A0004',
        'name'  => '九条ネギ(1本)',
        'price' => '378'
    ]
];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
    <table>
        <tr>
            <?php foreach ($recipe[0] as $key => $value ): ?>
            <th><?= $key ?></th>
            <?php endforeach;?>
        </tr>
            <?php foreach ($recipe as $key => $value): ?>
                <tr>
                    <td><?= $value['code'] ?></td>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['price'] ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>

<!-- <tr>
            <th>code</th>
            <th>name</th>
            <th>price</th>
        </tr>
        <?php for ($i = 0; $i < count($recipe); $i++): ?>
                <tr>
                <td><?= $recipe[$i]['code'] ?></td>
                <td><?= $recipe[$i]['name'] ?></td>
                <td><?= $recipe[$i]['price'] ?></td>
                </tr>
        <?php endfor; ?> -->