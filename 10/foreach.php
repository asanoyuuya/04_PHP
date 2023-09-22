<?php

$memberList = [
    ['name' => '太郎', 'age' => 32, 'point' => 320],
    ['name' => '次郎', 'age' => 21, 'point' => 180],
    ['name' => '三郎', 'age' => 30, 'point' => 240],
    ['name' => '四郎', 'age' => 28, 'point' => 80],
    ['name' => '五郎', 'age' => 24, 'point' => 480]
];


$totalage = 0;
$totalPoint = 0;

echo '<pre>';
print_r($memberList);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 800px;
            margin: 0 auto 50px;
        }

        th,
        td {
            border: 1px solid #666;
            padding: 15px;
        }

        th,
        tr:nth-child(even) {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>名前</th>
            <th>年齢</th>
            <th>ポイント</th>
        </tr>
        <?php foreach ($memberList as $member):?>
            <tr>
                <td><?=$member['name']?>様</td>
                <td><?=$member['age']?>歳</td>
                <td><?=$member['point']?>pt</td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th>平均</th>
                <td>
                    <?php for ($i = 0; $i < count($memberList); $i++):?>
                    <?php $totalAge = $totalAge + $memberList[$i]['age'];?>
                    <!-- / (count($member + 1))　割る数-->
                    <?=$totalAge?>
                </td>
                <td><?=$totalPoint?></td>
            </tr>
            <?php endfor;?>

            <?php for ($i = 0; $i < count($memberList); $i++):?>
        <?php endfor;?>
    </table>
</body>

</html>