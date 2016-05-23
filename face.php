<?php
define("access_in",1);
define("path_name",'face');
require 'include/common.inc.php';

?>

<!DOCTYPE html>
<html lang="zh">
<head>

	<meta charset="UTF-8">
	<title></title>
	<?php 
	require $_path.'include/title.inc.php'
	?>
	<script type="text/javascript" src="js/face_post.js">

	</script>
</head>
<body>
	<div id="face">
		<h2>选择头像</h2>
		<div id="face_main">
			<?php foreach (range(1,64) as $face_num) {?>
					<img src="face/m<?php echo $face_num ?>.gif" alt="头像<?php echo $face_num ?>" >
			<?php } ?>
		</div>
		
	</div>
</body>