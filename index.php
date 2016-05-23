<?php
define("path_name",'index');
define("access_in",1);
require 'include/common.inc.php';
require 'include/gobal.fun.php';

?>

<!DOCTYPE html>
<html lang="zh">
<head>

	<meta charset="UTF-8">
	<title>多用户留言系统---首页</title>
	<?php 
		require $_path.'include/title.inc.php'
	?>
	<link href="style/1/jquery.slideBox.css" rel="stylesheet" type="text/css">
	<script src="js/jquery.slideBox.min.js" type="text/javascript"></script>
</head>
<script ></script>
<body>
	<?php

		require $_path.'include/header.inc.php';
	?>
	<main>
		
	 	<div class="clear"></div>
				<div id="demo1" class="slideBox" style="width: 640px; height: 300px;">
					<ul class="items" style="width: 6400px; left: -1920px;">
					    <li class="" style="height: 300px;width: 680px;"><a href="" title="这里是测试标题一"><img src="img/slider1.jpg"></a></li>
					    <li class="" style="height: 220px;"><a href="" title="这里是测试标题二"><img src="img/slider2.jpg"></a></li>
					    <li class="active" style="height:"><a href="" title="这里是测试标题三"><img src="img/slider3.jpg"></a></li>
					    <li class="" style=" height: 220px;"><a href="" title="这里是测试标题四"><img src="img/1.jpg"></a></li>
					    <li class="" style=" height: 220px;"><a href="" title="这里是测试标题五"><img src="img/slider2.jpg"></a></li>
					</ul>
					<div class="tips" style="opacity: 0.6;">
						<div class="title"><a href="">这里是测试标题三</a></div>
						<div class="nums" style="top: 50px;">
							<a href="" class="" style="border-radius: 5px;">这里是测试标题一</a>
							<a href="" class="" style="border-radius: 5px;">这里是测试标题二</a>
							<a href="" class="active" style="border-radius: 5px;">这里是测试标题三</a>
							<a href="" class="" style="border-radius: 5px;">这里是测试标题四</a>
							<a href="" class="" style="border-radius: 5px;">这里是测试标题五</a>
						</div>
					</div>
				</div>
		<div id="main">

			<div class="title" style="border: none;">
				<li>帖子列表</li>
				<li id="new">
				<?php
					echo '<a href="new.php?'.$_SERVER["QUERY_STRING"].'">';
				?>
					我要发帖</a></li>
			</div>
			<div class="title" style="background: #f9f9f9">
				<li><a href="?pic">图片</a></li>
				<li><a href="?comic">番剧</a></li>
				<li><a href="?moive">电影</a></li>
				<li><a href="?life">生活</a></li>
				<li><a href="?tech">科技</a></li>
				<li><a href="?answer">问与答</a></li>
			</div>
			<div id="content" style="box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.1);">
			</div>
			<div class="nodata"></div>
    	</div>
		</div>
		
		<div id="sidebar">
			<div id="user">
                        <div class="cell">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody><tr>
                                    <td width="48" valign="top"><a href=""><img src="<?php echo "$face"; ?>" class="avatar" border="0" align="default" style="max-width: 48px; max-height: 48px;"></a></td>
                                    <td width="10" valign="top"></td>
                                    <td width="auto" align="left"><span class="bigger"><a href="/member/apppi">apppi</a></span>
                                        
                                    </td>
                                </tr>
                            </tbody></table>
                            <div class="sep10"></div>
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody><tr>
                                    <td width="33%" align="center"><a href="" class="dark" style="display: block;"><span class="bigger">0</span><div class="sep10"></div><span class="fade">节点收藏</span></a></td>
                                    <td width="34%" style="border-left: 1px solid rgba(100, 100, 100, 0.4); border-right: 1px solid rgba(100, 100, 100, 0.4);" align="center"><a href="/my/topics" class="dark" style="display: block;"><span class="bigger">1</span><div class="sep10"></div><span class="fade">主题收藏</span></a></td>
                                    <td width="33%" align="center"><a href="/my/following" class="dark" style="display: block;"><span class="bigger">0</span><div class="sep10"></div><span class="fade">特别关注</span></a></td>
                                </tr>
                            </tbody></table>
                        </div>
                        <div class="cell">
	                        <div style="width: 320px; background-color: #f0f0f0; height: 3px; display: inline-block; vertical-align: middle;">
	                        </div>
                        </div>
                        
                        <div class="cell" style="padding: 5px;">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody><tr>
                                    <td width="32"><a href=""><img src="images/flat_compose.png" width="32" border="0"></a></td>
                                    <td width="10"></td>
                                    <td width="auto" valign="middle" align="left"><a href="/new">创作新主题</a></td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>	
			
			<div id="hot">
				<div class="title" style="border-bottom:1px solid #ddd">今日热议</div>
				<div id="list">
					<ul>
						<ol><a href="">这里是测试标题一</a></ol>
						<ol><a href="">这里是测试标题二</a></ol>
						<ol><a href="">这里是测试标题三</a></ol>
						<ol><a href="">这里是测试标题四</a></ol>
						<ol><a href="">这里是测试标题五</a></ol>
					</ul>
				</div>				
			</div>
			
		</div>
	</main>
	<?php
		require $_path.'include/footer.inc.php';
	?>
</body>
<script type="text/javascript">
		            i = 1; //设置当前页数 
		            var access=true;
		            $(function() {
		                var totalpage = 100; //总页数，防止超过总页数继续滚动
		                var winH = $(window).height(); //页面可视区域高度 

		                $(window).scroll(function() {
		                    if (access) { // 当滚动的页数小于总页数的时候，继续加载
		                        var pageH = $(document.body).height();
		                        var scrollT = $(window).scrollTop(); //滚动条top 
		                        var aa = (pageH - winH - scrollT) / winH;
		                        if (aa < 1) {
		                           getJson(i)
		                        }
		                    } else { //否则显示无数据
		                        showEmpty();
		                    }
		                });
		                getJson(0); //加载第一页
		            });
		            function getJson(page) {
		             
		                $.getJSON("result.php", {page: i}, function(json) {
		                    if (json) {
		                        var str = "";
		                        $.each(json, function(index, array) {
		                            var str = "<div class='cell item' style=''>";
		                            var str = str + "<table width='100%'>";
		                            var str = str + "<td width='80px;text-align='center';><a href=''><img src='"+array['face']+"' class='avatar' border='0' align='default' width='50' height='50px'></a></td>";
		                            var str = str + "<td width='auto' valign='middle'>";
		                            var str = str + "<span class='item_title'><a href='articl.php?"+array['ID']+"'>"+array['title']+"</a></span>";
		                            var str = str + " <div style='margin-bottom:10px'></div>";
		                            var str = str + "<span class='small fade'>";
		                            var str = str + "<a class='node' href=''>"+array['type']+"</a> &nbsp;•&nbsp;";
		                            var str = str + "<strong><a href=''>"+array['username']+"</a></strong>"+"&nbsp;•&nbsp; 最后回复来自•&nbsp;";
		                            var str = str + "<strong><a href=''>"+array['lastuser']+"</a></strong>"+"&nbsp;•&nbsp;"+array['lastdate']+"</span></td>";
		                            var str = str + "<td width='70' align='right' valign='middle'><a href='' class='count_livid'>"+array['readcount']+"</a></td></tr></tbody></table></div>";

		                            $("#content").append(str);
		                        });
		                        $(".nodata").hide()
		                    } else {
		                        showEmpty();
		                        access=false;
		                    }
		                });
		                i++;
		            }
		            function showEmpty() {
		                $(".nodata").show().html("别滚动了，已经到底了。。。");
		            }
		        </script>
<script>

;(function($){
  $.fn.extend({
    /*
    元素根据滚动条位置自定义吸顶插件 
    @defaultTop 初始化top位置
    @startTop 开始滚动和回复原样的位置
    @demo
      var ensureTop = $('#ensure').offset().top;
      $('#columnFloat').setScroll({
        defaultTop: ensureTop,//需要设置的默认起始top位置
        startTop: ensureTop//从什么位置开始执行事件
      });
    */
    setScroll:function(opt){
    	
      if($(this).length<1 || !opt.startTop){return;}
      var isIE6 = !-[1,]&&!window.XMLHttpRequest,
        Timmer= null,
        $this = $(this),$win = $(window),
        startTop = opt.startTop;
        startLeft = opt.startLeft;
       	finish=opt.finish;
      /*初始化top位置*/

      /*开始滚动和回复原样的位置*/
      $win.bind('scroll',function(){

        if(Timmer){clearTimeout(Timmer);}
        Timmer = setTimeout(function(){
        	
          if($win.scrollTop()>=200 &&  $win.scrollTop()<=b.offsetTop-790){/*开始执行事件*/
          	
            if(isIE6){
              $this.css({'display':'inline-block','margin-left':0});
            }else{
              $this.css({'position':'fixed','top':0});
            }
          }else{
          	var d = document.getElementById('main');
          	if ($win.scrollTop()>=b.offsetTop-790) {
            $this.css({'position':'absolute','top':d.offsetHeight-a.clientHeight+45,'left':a.offsetLeft-20});
            }else{
            $this.css({'position':'absolute','top':90,'left':a.offsetLeft-20});	
            }
          }
        },40);
        
      });
    }
  });
})(jQuery);
var a=document.getElementById('sidebar');
var b=document.getElementById('footer');
var c = document.getElementById('content');
			console.log(c);
$('#sidebar').setScroll({
  defaultTop:200,
  startTop:a.offsetTop,
  startLeft:a.offsetLeft,
  finish:b.offsetTop
});

</script>

<script>
jQuery(function($){
	$('#demo1').slideBox({
		duration : 0.5,//滚动持续时间，单位：秒
		easing : 'linear',//swing,linear//滚动特效
		delay : 5,//滚动延迟时间，单位：秒
		startIndex : 5//初始焦点顺序
	});
});
</script>
</html>
