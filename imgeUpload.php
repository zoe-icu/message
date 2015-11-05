<?php
//$backValue=$_POST['filedata'];
//$backValue=$_POST['111'];
echo "+后台返回";
//echo "<script type='text/javascript'>window.location.href='message.php';</script>";

session_start();
header('Content-type:text/html;charset=utf-8');
require 'model.php';
    //$backValue='1234';
    $path = "./upload/";
    if(!file_exists($path)){
        mkdir("$path");
    }
    $filedata_name = $_FILES['filedata']['name'];
    $filedata_size = $_FILES['filedata']['size'];
    $filedata_type = $_FILES['filedata']['type'];
    $filedata = $_FILES['filedata']['tmp_name'];
    $data = addslashes(fread(fopen($filedata, 'r'), filesize($filedata)));
//    $src = 'Up/'.$filedata_name;
//    echo $src;
    if($filedata_name){
        $file1 = explode('.', $filedata_name);
        $kz = $file1[count($file1)-1];
        $time = time();
        $name = $time.'.'.$kz;
        $file2 = $path.$name;
        $flag = 1;
    }
    $_SESSION['file'] = $file2;//将路径存到session变量中
    $psid = session_id();
    if($flag){
        $result = move_uploaded_file($filedata, $file2);
        $fp = fopen("./upload/phpsid.txt", "w+");
        fwrite($fp, $psid);
    }
    if($result){
        $sql = "insert into photo (lujing)values('$file2')";
        $rs = $pdos->insert($sql);
        fclose($fp);
        //$backValue=$_POST[$file2];
        //echo $file2;
        //echo $_SESSION['file'];
        echo "<script type='text/javascript'>window.location.href='message.php';</script>";
    }
       
   
