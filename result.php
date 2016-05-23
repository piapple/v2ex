<?php
define("access_in",1);
require 'include/gobal.fun.php';


$page = intval($_GET['page']);  //获取请求的页数 

$pagenum = 20; //每页数量
$start = ($page - 1) * $pagenum;
$_sql=$_connect -> query("SELECT ID,username,type,title,lastuser,lastdate,readcount FROM  articl ORDER BY lastdate desc LIMIT $start,20");
while (!!$result=_fetch_array($_sql)) {
	$face=_fetch_array($_connect -> query("SELECT face FROM  user WHERE username='{$result['username']}'"));
    $arr[] = array( 
        'username'=>$result['username'], 
        'title'=>$result['title'],
        'type'=>$result['type'],
        'readcount'=>$result['readcount'],
        'lastuser'=>$result['lastuser'],
        'lastdate'=>tranTime($result['lastdate']),
        'face'=>$face['face'],
        'ID'=>$result['ID']
    ); 
}
if (isset($arr)) {
	echo json_encode($arr); 
}
?>
