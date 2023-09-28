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
                <?php for ($u = 0; $u < 10; $u++): ?>
                    <td>
                        <?php if ($i == $u) { ?>
                            <?php echo '00'; ?>
                        <?php } else { ?>
                            <?php echo $i . $u; ?>
                            <?php } ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>