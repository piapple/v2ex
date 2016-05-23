<?php
 define("access_in",1);
 require 'include/gobal.fun.php'; 
 $num = $_POST['num'] *10;
 if($_POST['num'] != 0) $num +1;
  $result=$_connect -> query("SELECT url,title,username FROM pic LIMIT ".$num.",20");
 $temp_arr = array();
 while($row = _fetch_array($result)){
     $temp_arr[] = $row;
 }
 $json_arr = array();
 foreach($temp_arr as $k=>$v){
     $json_arr[]  = (object)$v;
 }
 //print_r($json_arr);
 echo json_encode( $json_arr );