<?php
require 'common.inc.php';

	/*数据库连接*/
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PWD','');
	define('DB_NAME','testguest');

	/*创建数据库连接*/

	$_connect=mysqli_connect(DB_HOST,DB_USER,DB_PWD)
	or die('数据库连接失败');
	/*选择数据库*/
	$_connect -> select_db(DB_NAME) or die('数据库不存在');

	/*设置字符集*/
	$_connect -> query("SET NAMES UTF8") or('字符集错误');


	/*过滤数据*/
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	function _location($info,$_url){
		echo "<script type='text/javascript'>alert('$info');location.href='$_url';</script>";
	}

	
	function _fetch_array($_sql){
		return mysqli_fetch_array($_sql,MYSQL_ASSOC);
	}


	/*设置cookies*/
function _setcookies($name,$uniqid){
	setcookie('username',$name,time()+44800);
	setcookie('uniqid',$uniqid,time()+44800);
}

	/*清除cookies*/
function _unsetcookies(){
	setcookie('username',NULL);
	setcookie('uniqid',NULL);
	session_destroy();
	header('location:index.php');
}
/*登陆状态无法执行该操作*/
function _login_state(){
	if (isset($_COOKIE['username'])) {
		header('location:index.php');
	}
}

function _page($first_page,$second_page){
	$_pagesize=10;
}

/*时间转化函数*/
function tranTime($time) { 
    $rtime = date("m-d H:i",$time); 
    $htime = date("H:i",$time); 
    $time = time() - $time; 
 
    if ($time < 60) { 
        $str = '刚刚'; 
    } 
    elseif ($time < 60 * 60) { 
        $min = floor($time/60); 
        $str = $min.'分钟前'; 
    } 
    elseif ($time < 60 * 60 * 24) { 
        $h = floor($time/(60*60)); 
        $str = $h.'小时前 ';
    } 
    elseif ($time < 60 * 60 * 24 * 3) { 
        $d = floor($time/(60*60*24)); 
        if($d==1) 
           $str = '昨天 '.$rtime; 
        else 
           $str = '前天 '.$rtime; 
    } 
    else { 
        $str = $rtime; 
    } 
    return $str; 
} 
        


?>