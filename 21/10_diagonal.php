<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <table>
        <?php for ($i = 0; $i < 10; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < 10; $j++): ?>
                    <?php if ($i == $j): ?>
                        <th>00</th>
                        <?php else: ?>
                        <td><?= $i . $j ?></td>
                        <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>