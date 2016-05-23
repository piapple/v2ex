<?php
define("path_name",'member');
define("access_in",1);
require 'include/common.inc.php';
require $_path.'include/gobal.fun.php';

/*是否正常登陆*/
if (isset($_COOKIE['username'])) {
	$_sql=$_connect -> query("SELECT * FROM user WHERE username='{$_COOKIE['username']}' LIMIT 1");
	$_sql=_fetch_array($_sql);
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
					<div id="user_info">
						
						<p><img src="<?php echo $_sql['face'];?>"></p>
						<p><?php echo $_sql['username'];?></p>
					</div>
					<table>
						
						<tr>
							<td>性别：</td>
							<td><?php echo $_sql['gender'];?></td>
						</tr>
						
						<tr>
							<td>电子邮件：</td>
							<td><?php echo $_sql['email'];?></td>
						</tr>
						<tr>
							<td>主页：</td>
							<td><?php echo $_sql['website'];?></td>
						</tr>
						<tr>
							<td>Q Q：</td>
							<td><?php echo $_sql['qq'];?></td>
						</tr>
						<tr>
							<td>注册时间：</td>
							<td><?php echo $_sql['reg_time'];?></td>
						</tr>
						<tr>
							<td>身份：</td>
							<td><?php 
									if ($_sql['level']==1) {
										echo "管理员";
									}else{
										echo "普通用户";
									}
								?>
							</td>
							
						</tr>

					</table>
				</div>
		</div>
	</main>
	<?php
		require $_path.'include/footer.inc.php';

	?>
</body>

</html>