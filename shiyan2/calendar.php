<html>
<head>
    <title>年历实验</title>
</head>
<body>
<p style="text-align: center"><b>
        <?php
        /**
         * Created by PhpStorm.
         * User: admin
         * Date: 2020/9/22
         * Time: 14:41
         */

        $flag = false;
        $year = 2020;
        $month = 1;
        if ($year % 100 == 0) {
            $tag = ($year % 400 == 0) && ($year % 3200 != 0);
        } else {
            $tag = ($year % 4 == 0) && ($year % 100 != 0);
        }
        ?>
        <table class="calendar">
            <?php
            for ($i = 0; $i < 3; $i++) {
                $a = '<tr>';
                for ($j = 0; $j < 4; $j++, $month++) {
                    $a .= '<td>
                <table class="sub">
                <tr><th colspan="7" style="background-color: lightgray">' . $year . '年' . $month . '月</th></tr>
                <tr>
                    <th>日</th>
                    <th>一</th>
                    <th>二</th>
                    <th>三</th>
                    <th>四</th>
                    <th>五</th>
                    <th>六</th>
                 </tr>';
                    if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12)
                        $max_day = 31;
                    else if ($month == 2)
                        $max_day = $tag ? 29 : 28;
                    else
                        $max_day = 30;

                    $a .= '<tr>';
                    for ($date = 1; $date <= $max_day; $date++) {
                        if ($month < 3) {
                            $w = ($date + 2 * ($month + 12) + (int)(3 * ($month + 13) / 5) + $year + (int)(($year - 1) / 4) - (int)(($year - 1) / 100) + (int)(($year - 1) / 400)) % 7;
                        } else {
                            $w = ($date + 1 + 2 * $month + (int)(3 * ($month + 1) / 5) + $year + (int)($year / 4) - (int)($year / 100) + (int)($year / 400)) % 7;
                        }
                        if ($date == 1 && $w)
                            $a .= '<td colspan="'.$w.'"></td>';
                        $a.='<td>'.$date.'</td>';
                        if ($w == 6 && $date != $max_day)
                            $a .= '</tr><tr>';
                        else if ($w == 6)
                            $a.='</tr>';
                        $w = $w + 1 > 6 ? 0 : $w + 1;
                    }
                    $a .= '</table></td>';
                }
                $a .= '</tr>';
                echo $a;
            }

            ?>
        </table>
        <style>
            .calendar {
                margin-left: 150px;
            }

            .sub {
                padding: 10px 30px;
                height: 240px;
            }

            .sub tr td, .sub tr th {
                padding: 2px 5px;
            }
        </style>
</body>
</html>

