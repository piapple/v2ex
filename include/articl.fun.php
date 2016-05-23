<?php 

	require 'common.inc.php';
	

	$articl_id=$_SERVER["QUERY_STRING"];
	if (isset($articl_id)) {
		$articl=$_connect -> query("SELECT ID,username,title,type,content,readcount,commentcount,lastdate,reply,upvote,downvote
						  FROM articl
						  WHERE ID='{$articl_id}'
						  ");
		$articl=_fetch_array($articl);
		$articl['readcount']=$articl['readcount']+1;
		$commentcount=$articl['commentcount'];
		$_connect -> query("UPDATE articl set readcount='{$articl['readcount']}' WHERE ID='{$articl_id}' ");
		$face=_fetch_array($_connect -> query("SELECT face FROM  user WHERE username='{$articl['username']}'"));
		$articl['face']=$face['face'];
		if (isset($articl['reply'])) {
			$reply=unserialize($articl['reply']);
		}
		
	}


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$reply_content=test_input($_POST['reply']);
		$reply[$commentcount]['reply_username']=$_COOKIE['username'];
		$reply[$commentcount]['reply_content']=$reply_content;
		$reply[$commentcount]['reply_data']=time();
		$reply_time=time();
		$reply=serialize($reply);
		$_connect -> query("UPDATE articl 
									set reply='{$reply}',
										commentcount='{$commentcount}'+1,
										lastdate='{$reply_time}'
									WHERE ID='{$articl_id}'");
		if($_connect->affected_rows==1){
			$reply=_fetch_array($_connect->query("SELECT reply FROM articl WHERE ID='{$articl_id}'"));
			if (isset($reply['reply'])) {
			$reply=unserialize($reply['reply']);
		}
		}
	}



	


?>