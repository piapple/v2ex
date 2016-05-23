<?php
require 'common.inc.php';
// 定义变量并设置为空值
$access=true;
$nameErr=$passwdErr=$codeErr=$loginerr="";
$name=$passwd=$code="";

/*验证数据是否post*/
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	/*验证码是否正确*/
	if ($_POST['yzm']!=$_SESSION['code']) {
			$access=false;
			$codeErr="验证码不正确";
	}else{
		/*获取接受到的用户名密码*/
		$username=test_input($_POST['username']);
		$password=test_input($_POST['password']);
		if (test_input($username)=="") {
			$nameErr="用户名不能为空";
			$access=false;
		}
		if(test_input($password)==""){
			$passwdErr="密码不能为空";
			$access=false;
		}
		if ($access) {
			$userinfo=_fetch_array($_connect->query("SELECT * FROM user WHERE username='{$_POST['username']}' LIMIT 1"));
			if($userinfo){
				if ($userinfo['username']==$username && $userinfo['password']==$password) {
					if ($userinfo['active']=="") {
						$loginerr="登陆成功";
						$_cookies=_setcookies($userinfo['username'],$userinfo['uniqid']);
						session_destroy();
						$_connect->query("UPDATE user 
										  SET last_time=NOW()
										  WHERE username='{$_POST['username']}'");
						mysqli_close($_connect); 
						header('location:index.php');
					}else{
						$loginerr="该用户未激活";
					}
				}else{
					$loginerr="账号或密码错误";
				}
			}else{
				$loginerr="该用户不存在";
			}
		}


		}

 
}








?>