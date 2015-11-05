<?php
header('content-type:text/html;charset=utf-8');
require 'model.php';
$data = $_POST;
$path = "./upload/";//图片存入服务器端的路径
$filedata_name = $_FILES['filedata']['name'];
$filedata = $_FILES['filedata']['tmp_name'];

$sql_check = 'select id from test_message where name="'.$data['name'].'"';
$rs = $pdos->fitch($sql_check);
    //如果用户存在，再次插入留言

      
 if($filedata){
      if(!file_exists($path)){
       mkdir("$path"); 
       }
        $file1 = explode('.', $filedata_name);
        $kz = $file1[count($file1)-1];
        $time = time();
        $name = $time.'.'.$kz;
        $file2 = $path.$name;
//        $flag = 1;
        move_uploaded_file($filedata, $file2);
        
    }  else {
        $file2='';
}
//     if($flag){
//         move_uploaded_file($filedata, $file2);
//    }    
if(!empty($data['name'])){
    if($rs){
    $sql = 'insert test_message(name,email,phone,content,time,path) values("'.$data['name'].'","'.$data['email'].'","'.$data['phone'].'","'.$data['content'].'","'.date('Y-m-d H:i:s',time()).'","'.$file2.'")';
//    $sql_update = 'update test_message set content="'.$data['content'].'"'.' where id='.@$rs[0]['id'];
//    $result = $pdos->update($sql_update);
    $result = $pdos->insert($sql);
    echo "<script type='text/javascript'>window.location.href='message.php';</script>";
    }  else{
        echo "<script type='text/javascript'>window.location.href='signUp.html';</script>";
    }
}  else {
    echo "<script type='text/javascript'>window.location.href='message.php';</script>";
}
   

   
    