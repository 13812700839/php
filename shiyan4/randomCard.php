<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/10/20
 * Time: 16:12
 */

// 建立数组保存的牌组池
$num = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
$icon = ['♥' => 'red', '♦' => 'red', '♠' => 'black', '♣' => 'black'];
$card = [];
$palyer = [];
$text = '';
foreach ($icon as $k => $v) {
    for ($i = 0; $i < count($num); $i++) {
        array_push($card, '<span style="color:' . $v . '">' . $num[$i] . $k . '</span>');
    }
}
shuffle($card);
function publish()
{
    global $card;
    $text = '<table><tr>';
    for ($i = 0; $i < 10; $i++) {
        $text.='<td>'.array_pop($card).'</td>';
    }
    $text.='</tr></table>';
    echo $text;
}
?>
<html>
<body>
<div>
    <h3>玩家A牌组</h3>
    <?php publish() ?>
</div>
<div>
    <h3>玩家B牌组</h3>
    <?php publish() ?>
</div>
<div>
    <h3>玩家C牌组</h3>
    <?php publish() ?>
</div>
</body>
</html>

<style>
    tr,td{
        margin: 10px;
        padding: 10px;
        border: 1px solid gray;
    }
</style>