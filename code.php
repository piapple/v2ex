<?php
header ('Content-Type: image/png');
	for ($i=0;$i<4;$i++) { 
		@$code .=dechex(mt_rand(0,15));
	}
	session_start('code');
	$_SESSION['code']=$code;
	$_width=75;
	$_height=25;
	$im=@imagecreatetruecolor($_width,$_height);
	$white=imagecolorallocate($im, 255, 255, 255);
	$black=imagecolorallocate($im, 0, 0, 0);
	/*填充背景*/
	imagefill($im, 0, 0, $white);
	/*边框*/
	imagerectangle($im,0,0,$_width-1,$_height-1,$black);
	/*随机线条*/
	for ($i=0; $i <8 ; $i++) {
		$_rad_color=imagecolorallocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
		imageline($im,mt_rand(0,$_width), mt_rand(0,$_height),mt_rand(0,$_width),mt_rand(0,$_height),$_rad_color);
	}

	/*随机雪花*/
	for ($i=0;$i<30;$i++) { 
		imagestring($im, 1, mt_rand(2,$_width),mt_rand(2,$_height),".",
		imagecolorallocate($im, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255)));
	}
	/*将数字转换为图片*/
	for ($i=0; $i <strlen($_SESSION['code']); $i++) { 
		imagestring($im,5,$i*$_width/4+rand(1,10),$_height/5+rand(-5,5),$_SESSION['code'][$i],
			imagecolorallocate($im, mt_rand(0,100), mt_rand(0,100), mt_rand(0,100)));
	}
	
	imagepng($im);
	imagedestroy($im);
require dirname(__FILE__).'include/common.inc.php';

_face();
session_write_close();
?>