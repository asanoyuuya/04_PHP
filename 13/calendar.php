<?php
$dayCount = 1;
$year  = (new DateTime())->format('Y');
$month = (new DateTime())->format('m');
if (!empty($_POST)) {
    $year  = $_POST['year'];
    $month = $_POST['month'];

    $d = new DateTime($year . '-' . $month . '-01');
    $firstWeekNum = $d->modify('first day of this month')->format('w');
    $lastDayNum   = $d->modify('last day of this month')->format('d');
    $allDays = $firstWeekNum + $lastDayNum > 35 ? 42 : 35;

    for ($i = 0; $i < $allDays; $i++) {
        if ($i < $firstWeekNum) {
            $days[] = '';
        } elseif ($i >= $firstWeekNum + $lastDayNum) {
            $days[] = '';
        } else {
            $days[] = $dayCount;
            $dayCount++;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カレンダー</title>
    <style>
        table {
            border-collapse: collapse;
            width: 700px;
        }

        tr:nth-of-type(even) {
            background-color: #f6f6f6;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #eee;
            font-weight: bold;
        }

        td:first-of-type {
            background-color: #fee;
            font-weight: bold;
            color: #900;
        }

        td:nth-of-type(7) {
            background-color: #eef;
            font-weight: bold;
            color: #009;
        }
    </style>
</head>

<body>
    <h1>カレンダー</h1>
    <form action="" method="post" novalidate>
        <p>
            <select name="year">
                <?php for ($y = 1980; $y <= 2030; $y++) : ?>
                    <option <?= $year == $y ? 'selected' : '' ?>><?= $y ?></option>
                <?php endfor; ?>
            </select>年
            <select name="month">
                <?php for ($m = 1; $m <= 12; $m++) : ?>
                    <option <?= $month == $m ? 'selected' : '' ?>><?= $m ?></option>
                <?php endfor; ?>
            </select>月
            <input type="submit" value="送信">
        </p>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
        <table>
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            <tr>
                <?php for ($i = 0; $i < count($days); $i++) : ?>
                    <td><?= $days[$i] ?></td>
                    <?= $i % 7 == 6 ? '</tr><tr>' : ''?>
                <?php endfor; ?>
            </tr>
        </table>
    <?php endif; ?>
</body>

</html>