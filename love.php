<?php 
define("access_in",1);
require 'include/gobal.fun.php'; 
$id = intval($_POST['id']);
$user=$_COOKIE['username'];
$vote = $_SERVER["QUERY_STRING"]; 
if(!isset($id) || empty($id)) exit;   
    
$result=$_connect -> query("SELECT upvote,downvote,voteuser FROM articl WHERE ID='{$id}' ");
$result=_fetch_array($result);

$voteuser=unserialize($result['voteuser']);
$upvote=$result['upvote'];
$downvote=$result['downvote'];
if (!$voteuser=="") {
	foreach ($voteuser as $key => $value) {
  	if ($value==$user) {
  		exit;
  	}
  	else{
  		$count=0;
  	}
  } 
}else{
	$count=0;
}
 
if($count==0){ //如果没有记录 
	if ($vote=='up') {
		$_connect -> query("UPDATE articl set upvote=upvote+1 where id='{$id}'");
		if($_connect->affected_rows==1){
	  	$voteuser[$upvote+$downvote+1]=$user;
	  	$voteuser=serialize($voteuser);
	  	$_connect -> query("UPDATE articl set voteuser='{$voteuser}' where id='{$id}'");
	  	$upvote=$upvote+1;
	  	$arr[]=array(
	  		'change'=>1,
	  		'html'=>"\n<a href=\"javascript:\" onclick=\"upVoteTopic($id);\" class=\"vote\"><li class=\"fa fa-chevron-up\">⬆️</li> &nbsp;$upvote</a> &nbsp;<a href=\"javascript:\" onclick=\"downVoteTopic($id);\" class=\"vote\"><li class=\"fa fa-chevron-down\">⬇️</li>&nbsp;$downvote</a>",
	  		'topic_id'=>$id
	  		);
	  	echo json_encode($arr[0]);
	 	}

	  }elseif($vote='down'){
	  	$_connect -> query("UPDATE articl set downvote=downvote+1 where id='{$id}'");
	  	if($_connect->affected_rows==1){
	  	$voteuser[$upvote+$downvote+1]=$user;
	  	$voteuser=serialize($voteuser);
	  	$_connect -> query("UPDATE articl set voteuser='{$voteuser}' where id='{$id}'");
	  	$downvote=$downvote+1;
	  	$arr[]=array(
	  		'change'=>1,
	  		'html'=>"\n<a href=\"javascript:\" onclick=\"upVoteTopic($id);\" class=\"vote\"><li class=\"fa fa-chevron-up\">⬆️</li> &nbsp;$upvote</a> &nbsp;<a href=\"javascript:\" onclick=\"downVoteTopic($id);\" class=\"vote\"><li class=\"fa fa-chevron-down\">⬇️</li>&nbsp;$downvote</a>",
	  		'topic_id'=>$id
	  		);
	  	echo json_encode($arr[0]);
	 	}
	  }
}else{     
}  



 ?>

