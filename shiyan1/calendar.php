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

    $flag=false;
    $year=2020;
    $month=1;
    if($year%100==0){
        if($year%400==0&&$year%3200!=0){
            echo $year.'为世纪年闰年';
            $falg=true;
        }else{
            echo $year.'为世纪年平年';
        }
    }else{
        if($year%4==0&&$year%100!=0){
            echo $year.'为普通年闰年';
            $flag=true;
        }else{
            echo $year.'为普通年平年';
        }
    }
    ?>
        </b></p>
    <table class="calendar">
<?php
for($i=0;$i<3;$i++){
    $a= '<tr>';
    for($j=0;$j<4;$j++,$month++){
        $a.= '<td>
                <table class="sub">
                <caption style="background-color: lightgray"><b>'.$year.'年'.$month.'月</b></caption>
                <tr>
                    <th>日</th>
                    <th>一</th>
                    <th>二</th>
                    <th>三</th>
                    <th>四</th>
                    <th>五</th>
                    <th>六</th>
                 </tr>';
        switch ($month){
            case 1:case 3:case 5:case 7:case 8:case 10:case 12:
                $max=31;
                break;
            case 4:case 6:case 9:case 11:
                $max=30;
                break;
            case 2:
                $max=28;
                if($flag){
                    $max+=1;
                }
                break;
        }
        for($date=1;;){
            if($date>$max){
                break;
            }
            if($month<3){
                $w=($date+2*($month+12)+floor(3*($month+13)/5)+$year+floor(($year-1)/4)-floor(($year-1)/100)+floor(($year-1)/400))%7;
            }else{
                $w=($date+1+2*$month+floor(3*($month+1)/5)+$year+floor($year/4)-floor($year/100)+floor($year/400))%7;
            }
            $a.='<tr>';
            for($m=0;$m<7,$date<=$max;$m++){
                if ($w>6){
                    $w=0;
                    break;
                }
                if($m==$w){
                    $a.='<td>'.$date.'</td>';
                    $w++;
                    $date++;
                }else{
                    $a.='<td></td>';
                }
            }
            $a.='</tr>';
        }
        $a.= '</table></td>';
    }
    $a.= '</tr>';
    echo $a;
}

?>
</table>
    <style>
        .calendar{
            margin-left: 150px;
        }
        .sub{
            padding: 10px 30px;
            height: 240px;
        }
        .sub tr td,.sub tr th{
            padding: 2px 5px;
        }
    </style>
</body>
</html>

