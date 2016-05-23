<?php
session_start();
define("access_in",1);
require 'include/common.inc.php';
require 'include/gobal.fun.php';
define("path_name",'active');
if(!isset($_GET['active'])){
	_location('非法操作','index.php');
}
if (isset($_GET['action']) && isset($_GET['active']) && $_GET['action']=='ok') {
	$_active=test_input($_GET['active']);
	echo "$_active";
	$_sql=$_connect->query("SELECT active FROM user WHERE active='$_active' LIMIT 1");
	$_sql=_fetch_array($_sql);
	print_r($_sql);
	if($sql['active']==$_actives){
		echo "1";
		$_connect->query("UPDATE user SET active=NULL WHERE active='$_active' LIMIT 1");
		echo "1";
		if($_connect->affected_rows==1){
			_location('激活成功！','login.php');
		}else{
			_location('很遗憾，激活失败！','registe.php');
		}
	}
}

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
			<div class="title">账户激活</div>
			<p>本页面是为了模拟您的邮件的功能，点击以下着超级链接激活您的账户</p>
			<p><a href="active.php?action=ok&amp;active=<?php echo $_GET['active']; ?>"><?php echo 'http://'.$_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"] ?>?action=ok&amp;active=<?php echo $_GET['active']; ?></a></p>
		</div>
	</main>
	<?php
		require $_path.'include/footer.inc.php';

	?>
</body>