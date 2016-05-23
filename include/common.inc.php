<?php

	/*获取根目录*/
	$_path=substr(dirname(__file__),0,-7);

	/*访问控制*/
	if(!defined('access_in')){
		header('location:index.php');
	}




?>