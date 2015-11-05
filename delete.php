<?php
require 'model.php';
$data = $_POST;
$sql = 'delete from test_message where id='.$data['id'];
$rs = $pdos->delete($sql);
