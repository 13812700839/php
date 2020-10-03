<?php
/*
 * @Author: your name
 * @Date: 2020-10-03 17:29:24
 * @LastEditTime: 2020-10-03 19:10:17
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \github\php\shiyan3\chest.php
 */


 $row=8;
 $col=8;
$a="<table style=\"border: black solid 1px;\">";
for($i=0;$i<$row;$i++){
    $j=$i%2==0?0:1;
    $max_col=$i%2==0?$col:$col+1;
    $a.="<tr>";
    for(;$j<$max_col;$j++){

        if($j%2==0){
            $a.="<td style=\"background: black;\"></td>";
        }
        else{
            $a.="<td style=\"background: white;\"></td>";
        }
    }
    $a.="</tr>";
}

$a.="</table>";

echo $a;

 ?>

 <style>
     table{
         border-spacing:0;
     }
     td{
         width:50px;
         height:50px;
     }
 </style>