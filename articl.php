<?php

define("path_name",'articl');
define("access_in",1);
require 'include/gobal.fun.php';
require 'include/articl.fun.php';
/*if (!isset($_COOKIE['uniqid']) && !isset($_COOKIE['username']) ) {
	_location("登陆后执行操作","login.php");

}	*/




?>

<!DOCTYPE html>
<html lang="zh">
<head>

	<title>多用户留言系统---帖子</title>
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
			<div class="box" style="">
			    <div class="header">
			    <div class="fr">
			    	<a href="">
			    		<img src="<?php echo $articl['face']; ?>"  class="avatar" border="0" align="default">
			    	</a>
			    </div>
			    <a href="">Apppi</a> <span class="chevron">&nbsp;›&nbsp;</span> <a href="/go/qna"><?php echo $articl['type']; ?></a>
			    <div class="sep10"></div>
			    <h1><?php echo $articl['title']; ?></h1>
			    <div id="topic_<?php echo $articl['ID'];?>_votes" class="votes">
					<a href="javascript:" onclick="upVoteTopic(<?php echo $articl['ID'];?>);" class="vote">
						<li class="fa fa-chevron-up">⬆️</li> &nbsp;<?php echo $articl['upvote']; ?>

					</a> &nbsp;
					<a href="javascript:" onclick="downVoteTopic(<?php echo $articl['ID'];?>);" class="vote">
						<li class="fa fa-chevron-down">⬇️</li>&nbsp;<?php echo $articl['downvote']; ?>
					</a>
			    </div> &nbsp; 
			    <small class="gray">
			    	<a href=""><?php echo $articl['username']; ?></a> · <?php echo tranTime($articl['lastdate'])."&nbsp;·&nbsp;".$articl['readcount']."&nbsp;次点击"; ?> &nbsp; 
			    </small>
			    </div>
			    
			    
			    
			    <div class="cell">
			        
			        <div class="topic_content" style="overflow: hidden;">
			       	<?php echo $articl['content']; ?>
			   		</div>
			    </div>
			    
				    <div class="topic_buttons">
				    	<div class="fr gray f11" style="line-height: 12px; padding-top: 3px; text-shadow: 0px 1px 0px #fff;"><?php echo $articl['readcount']."次点击"; ?> &nbsp;</div>
				    	<a href="" class="tb">加入收藏</a> &nbsp;
				    	<a href="#;" onclick="window.open('http://service.weibo.com/share/share.php?url=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>?&amp;title=<?php echo $articl['title']."    via   ".$articl['username']; ?>', '_blank', 'width=550,height=370'); recordOutboundLink(this, 'Share', 'weibo.com');" class="tb">Weibo</a> &nbsp;
				    	<a href="#;" onclick="if (confirm('确定不想再看到这个主题？')) { location.href = '/ignore/topic/251255?once=59502'; }" class="tb">忽略主题</a> &nbsp;
				    	<div id="topic_thank"><a href="#;" onclick="if (confirm('你确定要向本主题创建者发送谢意？')) { thankTopic(<?php echo $articl['ID']; ?>,<?php echo $_COOKIE['username'] ?>); }" class="tb">感谢</a>
				    	</div>
				    </div>
				</div>
				<?php if ($reply=="") {
			    			echo "<div  style='text-align:center;background:none;line-height:70px;height:60px;margin-top:10xp;border:none;'>还没有人回复";}else{ ?>
			<div class="box" style="margin-top:10px;">
			    <div class="cell">
			    	<div class="fr" style="margin: -3px -5px 0px 0px;">
			    		<a href="/tag/DDR3" class="tag">test</a>
			    		<a href="/tag/doge" class="tag">test</a>
			    		<a href="/tag/内存" class="tag">test</a>
			    		<a href="/tag/MacBook" class="tag">test</a>
			    	</div>
			    	<span class="gray"><?php echo $articl['commentcount']-1; ?> 回复 &nbsp;<strong class="snow">|</strong> &nbsp;直到 <?php echo date("Y-m-d H:i",$articl['lastdate']); ?> +08:00</span>
			    </div>
			    <?php 	
			    	
			    		foreach ($reply as $key => $value) {
			    		$face=_fetch_array($_connect -> query("SELECT face FROM user WHERE username='{$value['reply_username']}'" ));
			    	?>
				<div id="r_<?php echo $articl['ID'];?>" class="cell">	
        
			        <table cellpadding="0" cellspacing="0" border="0" width="100%">
			            <tbody>
			            <tr>
			                <td width="48" valign="top" align="center"><img src="<?php echo $face['face']; ?>" class="avatar" border="0" align="default"></td>
			                <td width="10" valign="top"></td>
			                <td width="auto" valign="top"style="text-align: left;"><div class="fr"><div id="thank_area_2828605" class="thank_area"><a href="#;" onclick="if (confirm('确认要不再显示来自 @ETiV 的这条回复？')) { ignoreReply(2828605, '33296'); }" class="thank" style="color: #ccc;">隐藏</a> &nbsp; &nbsp; &nbsp; <a href="#;" onclick="if (confirm('确认花费 10 个铜币向 @ETiV 的这条回复发送感谢？')) { thankReply(2828605, 'hdsiisoxcnbywijrwybpvoelawlocyqp'); }" class="thank">感谢回复者</a></div> &nbsp; <a href="#;" onclick="replyOne('ETiV');"><img src="//cdn.v2ex.com/static/img/reply.png" align="absmiddle" border="0" alt="Reply"></a> &nbsp;&nbsp; <span class="no"><?php echo $key; ?></span></div>
			                    <div class="sep3"></div>
			                    <strong><a href="" class="dark"><?php echo $value['reply_username']; ?></a></strong>&nbsp; &nbsp;<span class="fade small"><?php echo tranTime($value['reply_data']); ?></span> 
			                    <div class="sep5"></div>
			                    <div class="reply_content"><?php echo $value['reply_content']; ?></div>
			                </td>
			           	</tr>
			        	</tbody>
			    	</table>
       			</div>
       			<?php }} ?>
       		</div>
       		<?php if (isset($_COOKIE['uniqid']) && isset($_COOKIE['username']) ) { ?>
			<div id="reply" style="padding:10px;box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.1);">
				<div class="title" style="border:none;height:40px;line-height:40px;">
					<li style="font-size:13px;">添加一条回复</li>
				</div>
		        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"] ?>" id="topic_form">
			        <table cellpadding="5" cellspacing="0" border="0" width="640px">
				        <tbody>
				            <tr>
				                <td>
				                	<textarea class="mle" style="height:150px;width:640px;margin-bottom:10px;border-radius:3px;border: 1px solid #ccc;" name="reply" id="topic_content"></textarea>
				                </td>
				            </tr>
				            <tr>
				                <td style="height:30px;line-height:30px;float:right;padding-right:10px;">
					            	<button type="submit" class="button" onclick="location.reload();"> &nbsp;回复</button>
					            </td>
				            </tr>
				        </tbody>
			    	</table>
		        </form>
	        </div>
	        <?php } else {?>
	        <div style="margin-top:20px;text-align: center;">请<a href="login.php">登陆</a>进行回复</div> 
	       	<?php } ?>   		
		</div>
		
		</div>
	</main>
	<?php require 'include/footer.inc.php'; ?>
</body>
<script type="text/javascript">
	function upVoteTopic(topicId) {
        var request = $.ajax({
            url: 'love.php?up',
            data:"id="+topicId,
            type: "POST",
            dataType: "json",
        });
         request.done(function(data) {
            if (data) {
                $('#topic_' + topicId + '_votes').html(data.html);
            }
        });
}
	function downVoteTopic(topicId) {
        var request = $.ajax({
            url: 'love.php?down',
            data:"id="+topicId,
            type: "POST",
            dataType: "json",
        });
        request.done(function(data) {
            if (data) {
                $('#topic_' + topicId + '_votes').html(data.html);
            }
        });
}

</script>
</html>
