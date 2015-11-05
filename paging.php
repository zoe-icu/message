<?php //
//require 'model.php';
//header('content-type:text/html;charset=utf-8');
//echo "<link href='css/style.css' rel='stylesheet' type='text/css' /> ";

$num = 3;//每页显示的数据的条数
$url = $_SERVER['REQUEST_URI'];//得到当前地址
$url = parse_url($url);//分析成有固定键值的数组
$url = $url['path']; //取出数组中的path的值
$count = count($pdos->fitch("select * from test_message"));//总的记录条数
if(@$_GET['page']){
    $pageStart = $_GET['page'];
    $page = ($pageStart-1) * $num;//page为连接要跳转的页数，开始下标，pagestart为当前页数
    $page .= ',';
}
@$sql = "select * from test_message limit $page $num";
$rs = $pdos->fitch($sql);

?>
<ul>
    <?php foreach($rs as $v):?>	
	<li class="first">
            <input type ="hidden" class="message_id" value="<?=$v['id']?>" />
            <a href="#" class=" icon user"></a><?=$v['name']?> : <input type="text" value="<?=$v['content']?>" class="text" readonly='readonly'/>
            <img src="<?=$v['path']?>" class='img'>
            <?=$v['time']?><button onclick="delete_message(this)">删除</button>
            <div class="clear"></div>
	</li>
    <?php endforeach;?>
</ul>
<?php
if ($count>$num){
    if(@$pageStart<=0)
        $pageStart=1;
    echo "<div class='page'>共".$count."条"."<a class='page'href=$url?page=".($pageStart-1).">上一页 </a>"."<a href=$url?page=".($pageStart+1).">下一页</a></div>";
}?>

