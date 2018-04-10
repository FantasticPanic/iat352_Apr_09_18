<?php
session_start();

if ($_SESSION['username'] ==""){
	header("Location: homepage.php");
	exit();
}

if(isset($_POST['topic_submit'])){
	if(($_POST['topic_title'] == "") && ($_POST['topic_content'] == "")){
	echo "Please fill in both fields";
	exit();
	}else{
	include_once("config.php");
	$cid = $_POST['cid'];
	$title = $_POST['topic_title'];
	$content = $_POST['topic_content'];
	$creator = $_SESSION['username'];
	$sql = "INSERT INTO topics (cat_id, topic_title, topic_creator, topic_date, topic_reply_date) VALUES ('".$cid."', '".
	$title."', '".$creator."', now(), now())";

	$res = mysqli_query($db, $sql) or die("hello error1");
	$new_topic_id = mysqli_insert_id();
	$sql2 = "INSERT INTO posts (cat_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$new_topic_id.
	"', '".$creator."', '".$content."', now())";

	$res2 = mysqli_query($db, $sql2) or die("hello error2");
	$sql3 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
	$res3 = mysqli_query($db, $sql3) or die("hello error3");
	if(($res) && ($res2) && ($res3)){
		header("Location: view_topic.php?cid=".$cid."&tid=".$new_topic_id);


	}else{
		echo "There was a problem creating your topic. Please try again.";

	}

	}
}


?>