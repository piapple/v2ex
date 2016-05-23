<?php
require 'common.inc.php';
// 定义变量并设置为空值
$_before=$_connect -> query("SELECT username,password,face,email,qq,website
							FROM user");
$_before=_fetch_array($_before);


$emailErr=$websiteErr=$passwdErr=$codeErr="";
$email = $_before['email'];
$website =$_before['website'];
$qq=$_before['qq'];
$face= $_before['face'];
$passwd= $repasswd= "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $passwd = test_input($_POST["password"]);
  $repasswd = test_input($_POST["repassword"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["url"]);
  $qq = test_input($_POST["qq"]);
  $face = test_input($_POST["face"]);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


		  /*验证密码*/
		  if (empty($_POST["password"])) {
		  	$access=true;
		  	$passwd=$_before['password'];
		   }elseif($passwd!=$repasswd) {
		  	$passwdErr = "密码不相同";
		  	$passwd=$_before['password'];
		  	$access=false;
		  }else{
		  	$access=true;
		  	$userinfo['password']=$passwd;
		  	$hash = password_hash($passwd, PASSWORD_DEFAULT);
		  }


		  /*验证邮箱*/
		  if (empty($_POST["email"])) {
		  	$email=$_before['email'];
		  } else {
		  	 // 检查电邮地址语法是否有效
		    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
		      $emailErr = "邮箱格式不正确"; 
		      $email=$_before['email'];
		    }
		    else{
		    	$userinfo['email']=$email;
				}
		  }


		  /*验证url*/
		  if (empty($_POST["url"])) {
		    $website=$_before['website'];
		  } else {
		  	if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $website)) {  
				$userinfo['website']=$website;
				} else { 
				$websiteErr="网页格式不正确"; 
				$website=$_before['website'];
				}  
		    
		  }

		  /*验证qq*/
		  if (empty($_POST["qq"])) {
		  	$qq=$_before['qq'];
		  	$userinfo['qq']=$qq;
		  } else{
		  	$userinfo['qq']=$qq;
		  }


		  /*获取头像*/
			if (empty($_POST["face"])) {
			    $sexErr = "头像错误";
			  } else {
			    $userinfo['face']=$face;
			  }

			 	if ($access==true) {
			 		# code...
			 	

			        $userinfo['password']=$passwd;
					$userinfo['repassword']=$repasswd;
					$userinfo['face']=$face;
					$userinfo['email']=$email;
					$userinfo['website']=$website;
					$userinfo['qq']=$qq;

					$_connect -> query("UPDATE user
										SET password = '{$userinfo['password']}',
											face = '{$userinfo['face']}',
											email = '{$userinfo['email']}',
											qq = '{$userinfo['qq']}',
											website = '{$userinfo['website']}'
										WHERE
											uniqid = '{$_COOKIE['uniqid']}'


											");
										if($_connect->affected_rows==1){
											_location('修改成功！','setting.php');
										}else{
											
											
										}
				}
									
}
?>





