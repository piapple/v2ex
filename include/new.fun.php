<?php 
require 'common.inc.php';
$error="";

$type = $_SERVER["QUERY_STRING"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	/*post数据验证*/
	
	$userinfo=$_connect -> query("SELECT uniqid,username
							  FROM user
							  WHERE username='{$_COOKIE['username']}'
							  ");
	$userinfo=_fetch_array($userinfo);
	if ($userinfo['uniqid']==$_COOKIE['uniqid']) {

		$username = $userinfo['username'];
		if(!test_input($_POST["title"])=='') {
			$title = test_input($_POST["title"]);
			$access=true;
		}else{
			$error="标题不能为空!";
			$access=false;
		}
		
		if ($type=="") {
			$type="warter";
		}
		@$content=$_POST["content"];
		$time=time();

		if ($access==true) {
				$_connect -> query("INSERT INTO articl(
										username,
										type,
										title,
										content,
										readcount,
										commentcount,
										date,
										lastuser,
										lastdate
										)
										VALUES 
										(
										'{$username}',
										'{$type}',
										'{$title}',
										'{$content}',
										'1',
										'1',
										'{$time}',
										'{$username}',
										'{$time}'
											)");
										if($_connect->affected_rows==1){
											/*$id=mysqli_insert_id($_connect);
											$path=$_SERVER['DOCUMENT_ROOT'].'/demo1/'.'t/'.$id;
											if (!file_exists($path)) {
												mkdir($path,0777);
												$_connect -> query("UPDATE articl 
																	SET url='{$path}' 
																	WHERE ID='{$id}' ");
												     
												    
											}else{
												echo "文件已存在";
											}*/
											
											_location('发帖成功','index.php');
										}else{
										}
		}

	}
	
}


 ?>