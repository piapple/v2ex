<?php 
/*
define("access_in",1);
require '../../include/gobal.fun.php';
$path = '..'; 
function get_filetree($path){ 
$tree = array(); 
foreach(glob($path.'/*') as $single){ 
if(is_dir($single)){ 
$tree = array_merge($tree,get_filetree($single)); 
} 
else{ 
$tree[] = $single; 
} 
} 
return $tree; 
} 
$path=get_filetree($path);
print_r($path);

foreach ($path as $key => $value) {
	$_connect -> query("INSERT INTO pic(url,title,username) VALUES ('{$path[$key]}','test','admin')");
	*/
}
 ?>
  $result=$_connect -> query("SELECT url,title,username FROM pic LIMIT ");