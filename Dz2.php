<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?
    function generateCalendar($month)
    {
        if ($month > 12 || $month < 1) {
            return;
        }

        $year = date('Y');
        $firstDayOfMonth = date('N', strtotime("$year-$month-01"));
        $daysInMonth = date('t', strtotime("$year-$month-01"));
        $startDay = $firstDayOfMonth - 1;

        echo "<table>";
        echo "<tr>";
        echo "<th>Пн</th>";
        echo "<th>Вт</th>";
        echo "<th>Ср</th>";
        echo "<th>Чт</th>";
        echo "<th>Пт</th>";
        echo "<th>Сб</th>";
        echo "<th>Вс</th>";
        echo "</tr>";

        $day = 1;
        $totalCells = $daysInMonth + $startDay - 1;

        for ($i = 0; $i < 6; $i++) {
            echo "<tr>";

            for ($j = 0; $j < 7; $j++) {
                if (($i == 0 && $j < $startDay) || ($i * 7 + $j - $startDay + 1 > $daysInMonth)) {
                    echo "<td></td>";
                } else {
                    echo "<td>" . ($i * 7 + $j - $startDay + 1) . "</td>";
                }
            }

            echo "</tr>";

            if ($day > $totalCells) {
                break;
            }
        }

        echo "</table>";
    }

    generateCalendar(date('n'));
    ?>
</body>

</html>