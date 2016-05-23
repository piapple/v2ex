<?php
define("path_name",'blog');
define("access_in",1);
require 'include/common.inc.php';
require $_path.'include/gobal.fun.php';

?>

<!DOCTYPE html>
<html lang="zh">
<head>

	<meta charset="UTF-8">
	<title>多用户留言系统---博友</title>
	<?php 
		require $_path.'include/title.inc.php'
	?>
</head>
<body>
	<?php
		require $_path.'include/header.inc.php';
	?>
	<main>
		<div id="blog">
			<div class="title">
				博友列表
			</div>
			<!--<?php
			if (isset($_GET['page'])) {
				$_page=$_GET['page'];
				if (empty($_page) || $_page <=0 || !is_numeric($_page)) {
					header('location:http://localhost/demo1/blog.php?page=1');
				}
				else{
					$_page=intval($_page);
				}
			}else{
				header('location:http://localhost/demo1/blog.php?page=1');
			}
			
			$_pagesize=9;
			$_pagenum=($_page-1)*9;
			$_sum_num=mysqli_num_rows($_connect->query("SELECT id FROM user"));
			$_page_sum=($_sum_num/9)%10;
			if ($_page>($_page_sum+1)) {
				header('location:http://localhost/demo1/blog.php?page=1');
			}
	
			
			$_sql=$_connect -> query("SELECT username,gender,face FROM user LIMIT $_pagenum,$_pagesize");
			while (!!$result=_fetch_array($_sql)) { ?>
				<div class="user">
					<img src=<?php echo $result['face'];?> alt="">
					<p><?php echo $result['username'];?></p>
					<ul>
						<li><img src="images/x1.gif"><a href="">发消息</a></li>
						<li><img src="images/x2.gif"><a href="">加为好友</a></li>
						<li><img src="images/x3.gif"><a href="">写留言</a></li>
						<li><img src="images/x4.gif"><a href="">给Ta送花</a></li>
					</ul>
				</div>
			<?php } ?>
			<div id="page">
			<?php 
			for ($i=1; $i <=$_page_sum+1; $i++) { 
				echo '<li class="page"><a href=?page='."$i".'>'."$i".'</a></li>';
			}
			?>-->
			
		     <ul id="stage">
		         <li></li>
		         <li></li>
		         <li></li>
		         <li></li>
		     </ul>
			</div>
		</div>
	</main>
	<?php
		require $_path.'include/footer.inc.php';

	?>
</body>
	<script type="text/javascript">
$(function(){
     jsonajax();
 });
  
 //这里就要进行计算滚动条当前所在的位置了。如果滚动条离最底部还有100px的时候就要进行调用ajax加载数据
 $(window).scroll(function(){    
     //此方法是在滚动条滚动时发生的函数
     // 当滚动到最底部以上100像素时，加载新内容
     var $doc_height,$s_top,$now_height;
     $doc_height = $(document).height();        //这里是document的整个高度
     $s_top = $(this).scrollTop();            //当前滚动条离最顶上多少高度
     $now_height = $(this).height();            //这里的this 也是就是window对象
     if(($doc_height - $s_top - $now_height) < 100) jsonajax();    
 });
  
  
 //做一个ajax方法来请求data.php不断的获取数据
 var $num = 0;
 function jsonajax(){
      
     $.ajax({
         url:'data.php',
         type:'POST',
         data:"num="+$num++,
         dataType:'json',
         success:function(json){
             if(typeof json == 'object'){
                 var neirou,$row,iheight,temp_h;
                 for(var i=0,l=json.length;i<l;i++){
                     neirou = json[i];    //当前层数据
                     //找了高度最少的列做添加新内容
                     iheight  =  -1;
                     $("#stage li").each(function(){
                         //得到当前li的高度
                         temp_h = Number($(this).height());
                         if(iheight == -1 || iheight >temp_h){
                             iheight = temp_h;
                             $row = $(this); //此时$row是li对象了
                         }
                     });
                     $item = $('<div class="image"><img src="demo1/'+neirou.url+'" border="0" width="200" height="300" ><br/>'+neirou.title+'</div>').hide();
                     $row.append($item);
                     $item.fadeIn();
                 }
             }
         }
     });
 }
	</script>
</html>
