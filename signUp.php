<?php
require 'model.php';
$data = $_POST;
$sql = 'insert test_message(name,email,phone,time) values("'.$data['name'].'","'.$data['email'].'","'.$data['phone'].'","'.date('Y-m-d H:i:s',time()).'")';
if(!(empty($data['name']))&&!(empty($data['email']))){
    $rs = $pdos->insert($sql);
    echo "<script type='text/javascript'>window.location.href='message.php';</script>";
}else{
    echo "<script type='text/javascript'>window.location.href='message.php';</script>";
}