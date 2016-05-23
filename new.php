<?php

define("path_name",'new');
define("access_in",1);
require 'include/gobal.fun.php';
require 'include/new.fun.php';

if (!isset($_COOKIE['uniqid']) && !isset($_COOKIE['username']) ) {
	_location("登陆后执行操作","login.php");

}	
?>

<!DOCTYPE html>
<html lang="zh">
<head>

	<meta charset="UTF-8">
	<title>多用户留言系统---发帖</title>
	<?php 
		require $_path.'include/title.inc.php'
	?>
</head>
<body>
	<?php
		require $_path.'include/header.inc.php';
	?>
	<main>
		<div id="sidebar">
			<div id="user">
				<div class="title">热门消息</div>
							
			</div>
			<div id="pic">
				<div class="title">最新图片</div>
			</div>
		</div>
		<div id="main">
			<div class="title">
				<li>发布帖子</li>
			</div>
		<div class="cell">
	        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?".$type;?>" id="topic_form">
	        <table cellpadding="5" cellspacing="0" border="0" width="100%">
	            <tbody>
	            <tr>
	            	<div class="cell" style="border:none;"><div class="fr fade" id="title_remaining">120</div>
        				主题标题
    				</div>
	            </tr>
	            <tr>
	                <div class="cell" style="padding: 0px; background-color: #fff;border:none;margin-bottom:10px;">
	                	<textarea class="msl" rows="1" maxlength="120" id="topic_title" name="title" autofocus="autofocus" placeholder="请输入主题标题，如果标题能够表达完整内容，则正文可以为空"></textarea>
	                </div>
	            </tr>
	            <tr>
	                <td>
	                	<!--<textarea class="mle" style="height: 200px; width: 560px;margin-bottom:10px;" name="content" id="topic_content">
	                	</textarea>-->
						<script id="container" name="content" type="text/plain"></script>
					    <!-- 配置文件 -->
					    <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
					    <!-- 编辑器源码文件 -->
					    <script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>
					    <!-- 实例化编辑器 -->
					    <script type="text/javascript">
					        var ue = UE.getEditor('container');
					    </script>
   						
	                </td>
	            </tr>
	            <tr>
	                <td style="height:30px;line-height:30px;float:right;padding:10px 30px 0px 0px;">
	                	<label id="error" style="color:red;"><?php echo $error ?></label>
		            	<button type="submit" class="button" onclick=""> &nbsp;创建</button>
		            </td>
	            </tr>
	        </tbody>
	    	</table>
	        </form>
    	</div>
			
		</div>
	</main>
	<?php
		require $_path.'include/footer.inc.php';

	?>
</body>
</html>
