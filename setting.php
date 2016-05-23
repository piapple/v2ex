<?php
define("path_name",'setting');
define("access_in",1);
require 'include/common.inc.php';
require $_path.'include/gobal.fun.php';
require $_path.'include/setting.fun.php';

/*是否正常登陆*/
if (isset($_COOKIE['username'])) {
	
}else{
	header('location:http://localhost/demo1/index.php');
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>

	<meta charset="UTF-8">
	<title>多用户留言系统---个人中心</title>
	<?php 
		require $_path.'include/title.inc.php'
	?>
	<script type="text/javascript" src="js/face.js">
	</script>
	<script type="text/javascript">
		function read(){
			document.getElementById("website").readOnly=false;
			document.getElementById("email").readOnly=false;
			document.getElementById("qq").readOnly=false;
		}
	</script>
	
</head>
<body>
	<?php
		require $_path.'include/header.inc.php';
	?>
	<main>
		<div id="member">
			<?php 
				require $_path.'include/sidebar_inc.php';
			?>
			<div id="menmber_main">
				<div class="title">
					会员管理中心
				</div>
				<div id="menmber_info">
					
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="setting">
					<div id="user_info">
						<p><input type="text" value="http://localhost/demo1/face/m1.gif" name="face" id="face_path" style="display:none;"/>
						<p><img src="<?php echo $face;?>" id="faceimg"></p>
						<p><?php echo $_before['username'];?></p>
						<script>
						var faceimg=document.getElementById('faceimg').src;
						var face_path=document.getElementById('face_path');
						face_path.value=faceimg;
						</script>
					</div>
				<div>
					<p><label>密码:</label>&nbsp;<input type="password" name="password" class="text" maxlength="15" min="6" ><span id="error"><?php echo $passwdErr;?></span></p>
					<p><label>确认密码:</label>&nbsp;<input type="password" name="repassword" class="text" maxlength="15" min="6" ></p>
					<p><label>电子邮件:</label>&nbsp;<input type="text" id="email" name="email" class="text" value="<?php echo "$email"; ?>" maxlength="20" readonly="readonly" style="border:none;" onclick="read()"><span id="error"><?php echo $emailErr;?></span></p>
					<p><label>qq:</label>&nbsp;<input type="text" id="qq" name="qq" class="text" value="<?php echo "$qq"; ?>" maxlength="15" readonly="readonly" style="border:none;" onclick="read()"></p>
					<p><label>主页地址:</label>&nbsp;<input type="text" id="website" name="url" class="text" value="<?php echo "$website"; ?>" readonly="readonly" style="border:none;" onclick="read()"><span id="error"><?php echo $websiteErr;?></span></p>
					<p><input type="submit" value="修改" class="button"><input type="reset" value="重置" class="button"></p>
				</div>
			</form>
				</div>
		</div>
	</main>
	<?php
		require $_path.'include/footer.inc.php';
		 mysqli_close($_connect); 
	?>
</body>

</html>