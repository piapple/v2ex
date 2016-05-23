<?php
session_start();
define("access_in",1);
require 'include/common.inc.php';
require $_path.'include/gobal.fun.php';
require $_path.'include/login.fun.php';
define("path_name",'login');
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
</head>
<body>
	<?php
		require $_path.'include/header.inc.php';
	?>
	<main>
	<div id="login">
		<div class="title">用户登录</div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<div>
					<p><label>用 户 名:</label>&nbsp;<input type="text" name="username" class="text" value="<?php echo $name; ?>"maxlength="15" min="4" ><span id="error"><?php echo $nameErr;?></span></p>
					<p><label>密码:</label>&nbsp;<input type="password" name="password" class="text" maxlength="15" min="6" ><span id="error"><?php echo $passwdErr;?></span></p>
					<p><label>验证码:</label>&nbsp;<input type="text" name="yzm" class="text" maxlength="4" style="width:60px;margin-right:110px;"><img src="code.php" alt="" id="code" onclick="javascript:this.src='code.php?tm='+Math.random()"><span id="error"><?php echo $codeErr;?></span></p>
					<?php echo "<p style='color:red;font-size:15px'>$loginerr<p>" ?>
					<p><input type="submit" value="登录" class="button"><input type="reset" value="重置" class="button"></p>

				</div>
	</div>
	</main>
	<?php

		require $_path.'include/footer.inc.php';
	?>
</body>
</html>
