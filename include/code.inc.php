<?php
require 'common.inc.php';
// 定义变量并设置为空值

$access=true;
$nameErr = $emailErr = $genderErr = $websiteErr =$passwdErr=$codeErr=$sexErr= "";
$name = $email = $gender = $comment = $website =$passwd= $repasswd=$qq=$sex=$face="";





if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name= test_input($_POST["username"]);
  $passwd = test_input($_POST["password"]);
  $repasswd = test_input($_POST["repassword"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["url"]);
  $qq = test_input($_POST["qq"]);
  $face = test_input($_POST["face"]);
  @$uniqid=test_input($_POST["uniqid"]);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($_POST['yzm']!=$_SESSION['code']) {
			$access=false;
			$codeErr="验证码不正确";
		}else{

		/*验证用户名*/
		if (empty($_POST["username"])) {
			$access=false;
		    $nameErr = "用户名不能为空";
		} else {
		  		if (@preg_match('/^[a-zA-Z][a-zA-Z0-9_]{4,15}$/',$name)) {
		  		$repeat=$_connect -> query("SELECT username FROM user WHERE username='{$_POST["username"]}'");
				if (mysqli_fetch_array($repeat,MYSQL_ASSOC)) {
		    		$access=false;
		    		$nameErr="该用户名已被注册！";
		    	}else{
		    		@$name = test_input($_POST["username"]);
		    	}
				 
				
				} else {
				$access=false;
				$nameErr = "字母开头，允许5-16字节，允许字母数字下划线";}
		   }


		  /*验证密码*/
		  if (empty($_POST["password"])) {
		  	$access=false;
		    $passwdErr = "密码不能为空";
		   }elseif($passwd!=$repasswd) {
		   	$access=false;
		  	$passwdErr = "密码不相同";
		  }else{
		  	
		  	$passwd = test_input($_POST['repassword']);
		  	$hash = password_hash($passwd, PASSWORD_DEFAULT);
		  }


		  /*验证邮箱*/
		  if (empty($_POST["email"])) {
		  	$access=false;
		    $emailErr = "Email不能为空";
		  } else {
		  	 // 检查电邮地址语法是否有效
		    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
		    $access=false;
		      $emailErr = "邮箱格式不正确"; 
		    }
		    else{
		    	$email = test_input($_POST["email"]);
				}
		  }


		  /*验证url*/
		  if (empty($_POST["url"])) {
		    $website = "";
		  } else {
		  	if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $website)) {  
				   $website = test_input($_POST["url"]);
				} else { 
				$access=false;
				$websiteErr="网页格式不正确"; 
				}  
		    
		  }

		  /*验证qq*/
		  if (empty($_POST["qq"])) {
		    $qq = "";
		  } else{
		  	$qq=$_POST['qq'];
		  }


		  /*获取性别*/
		   if (empty($_POST["sex"])) {
		   	    $access=false;
			    $sexErr = "性别错误";
			  } else {
			    $gender = test_input($_POST["sex"]);
			  }
			}

		  /*获取头像*/
			if (empty($_POST["face"])) {
			    $sexErr = "头像错误";
			    $access=false;
			  } else {
			    $face = test_input($_POST["face"]);
			  }



			  if((strlen($_SESSION['uniqid'])!=40)||($_SESSION['uniqid']==@$_POST['uniqid'])||($access==false)){
				}else{
					$userinfo['username']=$name;
					$userinfo['password']=$passwd;
					$userinfo['repassword']=$repasswd;
					$userinfo['gender']=$gender;
					$userinfo['face']=$face;
					$userinfo['email']=$email;
					$userinfo['website']=$website;
					$userinfo['qq']=$qq;
					$userinfo['active']=sha1(uniqid(rand(),true));

					$_connect -> query("INSERT INTO user(
										uniqid,
										active,
										username,
										password,
										gender,
										face,
										email,
										qq,
										website,
										reg_time,
										last_time,
										last_ip
										)
										VALUES 
										(
										'{$_SESSION['uniqid']}',
										'{$userinfo['active']}',
										'{$userinfo['username']}',
										'{$userinfo['password']}',
										'{$userinfo['gender']}',
										'{$userinfo['face']}',
										'{$userinfo['email']}',
										'{$userinfo['qq']}',
										'{$userinfo['website']}',
										NOW(),
										NOW(),
										'{$_SERVER["REMOTE_ADDR"]}'
											)");
										if($_connect->affected_rows==1){
											_location('恭喜你注册成功！','active.php?active='.$userinfo['active']);
											$_POST['active'];
										}else{
											print_r($userinfo);
											_location('很遗憾，注册失败！','registe.php');
											
										}
				 mysqli_close($_connect); 
				 session_destroy();
										
				}
			
	}
?>