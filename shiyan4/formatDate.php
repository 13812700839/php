<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/10/20
 * Time: 14:50
 */

$date=strtotime('2021-01-01 00:00:00');
$birthdate=strtotime('2021-08-28 00:00:00');

function format_date($t){
    $a='';
    if($t>0){
        $day=floor($t/(3600*24));
        $a.=$day!=0?$day.'天':'';
        $hour=floor($t/3600)%24;
        $a.=$hour!=0?$hour.'小时':'';
        $minute=floor($t/60)%60;
        $a.=$minute!=0?$minute.'分钟':'';
        $second=$t%60;
        $a.=($a==''||$second!=0)?$second.'秒':'';
        return $a.'<br>';
    }else
        return '时间输入错误';
}

echo format_date(10);
echo format_date(120);
echo format_date(60*60*24*6);
echo '距离元旦还有：'.format_date($date-time());
echo '距离明年生日还有：'.format_date($birthdate-time());