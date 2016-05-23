<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<?php 
require 'gobal.fun.php';
//连接数据库 
$page = $_GET['page'];  //获取请求的页数 
echo "QQQ";
$start = $page*5; 
$_sql=$_connect -> query("SELECT * FROM articl ORDER BY lastdate desc LIMIT $start,5");
while (!!$result=_fetch_array($_sql)) { 
    $arr[] = array( 
        'username'=>$result['username'], 
        'content'=>$result['content'], 
        'title'=>$result['title'],
        'lastuser'=>$result['lastuser'],
        'lastdate'=>tranTime($result['lastdate']) 
    ); 
} 
echo json_encode($arr);  

 ?>