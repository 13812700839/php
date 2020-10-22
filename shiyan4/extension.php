<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/10/20
 * Time: 15:11
 */
//电话号码隐藏中间四位
$phone_num='13812700839';
$replace_str=str_repeat('*',4);
echo substr_replace($phone_num,$replace_str,3,4);

echo '<br>';

//用递归函数求桃子总数
$sum=0;
function peach($n){
    global $sum;
    if($n==1)
        return $sum+1;
    $sum=($sum+1)*2;
    return peach($n-1);
}
echo '桃子总数：'.peach(10);
