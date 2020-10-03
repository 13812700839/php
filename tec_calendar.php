<?php
$year = 2020;

if ($year % 100 == 0) {
    $tag = ($year % 400 == 0) && ($year % 3200 != 0);
} else {
    $tag = ($year % 4 == 0) && ($year % 100 != 0);
}

$cly = 2019;
$clm = 13;
$cld = 1;


$w = ($cld + 1 + 2 * $clm + (int)(3 * ($clm + 1) / 5) + $cly + (int)($cly / 4) - (int)($cly / 100) + (int)($cly / 400)) % 7;

for ($i = 1; $i <= 12; $i += 1) {
    if ($i == 1 || $i == 3 || $i == 5 || $i == 7 || $i == 8 || $i == 10 || $i == 12) {
        $max_day = 31;
    } else if ($i == 2) {
        $max_day = $tag ? 29 : 28;
        /* if ($tag) {
             $max_day = 29;
         } else {
             $max_day = 28;
         }*/
    } else {
        $max_day = 30;
    }

    echo '<table class="demo"><tr><th colspan="7">' . $year . '年' . $i . '月</th></tr>';

    echo '<tr><td>日</td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td></tr>';

    echo '<tr>';
    for ($j = 1; $j <= $max_day; $j++) {
        if ($j == 1 && $w) {
            echo '<td colspan="' . $w . '"></td>';
        }
        echo '<td>' . $j . '</td>';
        if ($w == 6 && $j != $max_day) {
            echo '</tr><tr>';
        }else if ($w==6){
            echo '</tr>';
        }

        $w = $w + 1 > 6 ? 0 : $w + 1;
    }

    echo '</table>';
}

?>

<style>
    .demo{
        float: left;
        width: 160px;
        height: 180px;
        margin: 10px;
    }
</style>
