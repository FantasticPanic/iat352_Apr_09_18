<?php
session_start();
if($_SESSION['username']){
	if(isset($_POST['reply_submit'])){
		include_once("config.php");
		$creator = $_SESSION['username'];
		$cid = $_POST['cid'];
		$tid = $_POST['tid'];
		$reply_content = $_POST['reply_content'];
		$sql = "INSERT INTO posts (cat_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$tid."', '".$creator."','".$reply_content."', now())";


		$res = mysqli_query($db, $sql) or die("hello error");
		$sql2 = "UPDATE categories SET last_post_date = now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		$res2 = mysqli_query($db, $sql2) or die("hello error2");


		$sql3 = "UPDATE topics SET topic_reply_date=now() , topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
		$res3 = mysqli_query($db, $sql3) or die("hello error3");


		//

		if(($res) &&($res2) &&($res3)){
			echo "<p>Your reply has been sucessfully posted. <a href='view_topic.php?cid=".$cid."&tid=".$tid."'>Return to the topic</a></p>";

		}else{
			echo "<p> Cannot submit reply. Try again later.</p>";
		}
		//
	
	}else{
		exit();
	}

}else{
	exit();
}



?>