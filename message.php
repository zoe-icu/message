<?php
	require 'model.php';
        
	$sql = 'select id,name,email,phone,content,time lujing from test_message';
	$rs = $pdos->fitch($sql);
//        include 'readImage.php';
	include 'index.html';
	
	//var_dump($rs);js