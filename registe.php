<?php
session_start();
define("access_in",1);
$_SESSION['uniqid']=$_uniqid=sha1(uniqid(rand(),true));
require 'include/common.inc.php';
require $_path.'include/gobal.fun.php';
require $_path.'include/code.inc.php';
define("path_name",'registe');
_login_state();
?>

<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>多用户留言系统---首页</title>
	<?php 
	require $_path.'include/title.inc.php'
	?>
	<script type="text/javascript" src="js/face.js">

	</script>
</head>
<body>
	<?php
		require $_path.'include/header.inc.php';
	?>
	<main>
		<div id="registe">
			<div class="title">会员注册</div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<h2>请填写以下内容</h2>
				<div>
					<input type="hidden" value="<?php echo "$_uniqid"; ?>" name="uniqid"  />
					<p><label>用 户 名:</label>&nbsp;<input type="text" name="username" class="text" value="<?php echo $name; ?>"maxlength="15" min="4" ><span id="error"><?php echo $nameErr;?></span></p>
					<p><label>密码:</label>&nbsp;<input type="password" name="password" class="text" maxlength="15" min="6" ><span id="error"><?php echo $passwdErr;?></span></p>
					<p><label>确认密码:</label>&nbsp;<input type="password" name="repassword" class="text" maxlength="15" min="6" ></p>
					<p><label>性别:</label>&nbsp;<input type="radio" name="sex" value="男" checked="checked">男<input type="radio" name="sex" value="女">女</p>
					<p><input type="text" value="face/m1.gif" name="face" id="face_path" style="display:none;"><img src="face/m1.gif" alt="头像" id="faceimg"></p>
					<p><label>电子邮件:</label>&nbsp;<input type="text" name="email" class="text" value="<?php echo "$email"; ?>" maxlength="20"><span id="error"><?php echo $emailErr;?></span></p>
					<p><label>qq:</label>&nbsp;<input type="text" name="qq" class="text" value="<?php echo "$qq"; ?>" maxlength="15"></p>
					<p><label>主页地址:</label>&nbsp;<input type="text" name="url" class="text" value="<?php echo "$website"; ?>"><span id="error"><?php echo $websiteErr;?></span></p>
					<p><label>验证码:</label>&nbsp;<input type="text" name="yzm" class="text" maxlength="4" style="width:60px;margin-right:110px;"><img src="code.php" alt="" id="code" onclick="javascript:this.src='code.php?tm='+Math.random()"><span id="error"><?php echo $codeErr;?></span></p>
					<p><input type="submit" value="注册" class="button"><input type="reset" value="重置" class="button"></p>
				</div>
			</form>
	</main>
	<?php
		require $_path.'include/footer.inc.php';
	?>
</body>
</html>
