<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>九九表</title>
</head>
<body>
    <h1>九九表</h1>
    <table>
        <tr>
            <th></th>
            <?php for ($i = 1; $i <= 9; $i++) :?>
                <th> <?= $i ?></th>
            <?php endfor; ?>
            <?php for ($j = 1; $j <= 9; $j++) :?>
                <tr>
                    <th><?= $j ?></th>
                        <?php for ($k = 1; $k <=9; $k++): ?>
                            <td> <?= $j * $k ?></td>        
                        <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </tr>
    </table>
</body>
</html>
