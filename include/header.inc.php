<?php
		require 'common.inc.php';
?>

<header>
		<div id="logo">P i</div>
		<div id="Search" style="float: left;margin-top:18px;padding-left: 60px;">
			<form onsubmit="">
				<div style="width: 276px; height: 28px;background-size: 276px 28px; background-image: url('images/qbar_light@2x.png'); background-repeat: no-repeat;">
					<input type="text" maxlength="40" name="q" id="q" value="">
				</div>
			</form>
		</div>
		<div id="nav">
			<ul>
				<li><a href="index.php">首页</a></li>
					
				<?php 
					if (!!isset($_COOKIE['username'])) {
						echo '<li><a href="member.php" style="color:#999;">'.$_COOKIE['username']."的个人中心".'</a></li>';
					}else{
						echo '<li><a href="registe.php">注册</a></li>
							  <li><a href="login.php">登陆</a></li>';
					}
				?>
				<li><a href="blog.php?page=1">图吧</a></li>
				<li><a href="#">资料</a></li>
				<li><a href="#">管理</a></li>
				<?php 
				if (!!isset($_COOKIE['username'])) {
					echo '<li><a href="logout.php">退出</a></li>';
				}
				?>
			</ul>
		</div>
	</header>