<?php
$month = $_POST['month'];
$birthStones



?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>誕生石</h1>
    <p><?=$month?>の誕生石は<?=$birthStones?>です！</p>
    <form action="" method="post" novalidate>
        <th></th>
        <td>
            誕生月を選んでください：
            <select name="month">
                <option namme="month" value="1月" selected>1月</option>
                <option namme="month" value="2月">2月</option>
                <option namme="month" value="3月">3月</option>
                <option namme="month" value="4月">4月</option>
                <option namme="month" value="5月">5月</option>
                <option namme="month" value="6月">6月</option>
                <option namme="month" value="7月">7月</option>
                <option namme="month" value="8月">8月</option>
                <option namme="month" value="9月">9月</option>
                <option namme="month" value="10月">10月</option>
                <option namme="month" value="11月">11月</option>
                <option namme="month" value="12月">12月</option>
            </select>
            <input type="submit" value="送信">
            </p>
        </td>
</body>

</html>