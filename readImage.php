<?php
//require 'model.php';
header('Content-type:text/html;charset=utf-8');
$sql_img = "select id,lujing from photo";
$rs_img = $pdos->fitch($sql_img);
//print_r($rs_img);
//foreach ($rs_img as $v_img) {
//    print_r($v_img);
//    echo '<img src="'.$v_img['lujing'].'">';
//}
//echo '<img src="'.rs_img['lujing'].'">';


