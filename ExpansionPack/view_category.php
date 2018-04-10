<?php  
session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link href="css/styles2.css" rel="stylesheet" type = "text/css" >
</head>
<body>
	
	<div id = "main-wrapper">
		<h2><a href="homepage.php"> Homepage</a></h2>
		<!-- <h3>You are now logged in -->
		<!-- <?php  
			//echo $_SESSION ['username']; 
		?> -->

		<?php
		if(isset($_SESSION['username'])){
			echo "You are now logged in as ", $_SESSION['username'];
			//echo " &nbsp;&nbsp;&nbsp;<a href='login.php'>Log out</a>";
			//echo'<input name = "logout" type = "submit" id="logout_btn" value = "Log Out"/><br>';



			//add logout button
		}else{
				echo "You are not logged in yet";
			echo "<li><a href='login.php'>Log In</a></li>";


		}

		if(isset($_POST['logout']))
		{

 	session_destroy();
	header('location:login.php');
 		}


		?>
		<!-- </h3> -->

	<form action = "homepage.php" method = "post">
		<input name = "logout" type = "submit" id="logout_btn" value = "Log Out"/><br>

		
</form>

</div>

<?php  
include_once("config.php");
$cid = $_GET['cid'];

if(isset($_SESSION['username'])){
	$logged = " | <a href='create_topic.php?cid=".$cid."'>Click Here to Create A Topic</a>";
}else{
	$logged = " | Please <a href='login.php'>log in</a> to create topics in this forum";
}

$sql = "SELECT id FROM categories WHERE id ='".$cid."' LIMIT 1";
$res = mysqli_query($db, $sql) or die("hello error");




if(mysqli_num_rows($res) ==1){
	$sql2 = "SELECT * FROM topics WHERE cat_id='".$cid."' ORDER BY topic_reply_date DESC";
	$res2 = mysqli_query($db, $sql2) or die ("hello error");
	if(mysqli_num_rows($res2) > 0){
		$topics = "<table width='100%' style='border-collapse: collpase;'>";
		$topics .= "<tr><td colspan='3'><a href='homepage.php'>Return to Forum </a>".$logged. "<hr /></td></tr>";
		$topics .= "<tr style='background-color: #dddddd;'><td>Topic Title</td><td width='65' align='center'>Replies</td><td width='65'
		align='center'>Views</td></tr>";

		$topics .="<tr><td colspan='3'><hr /></td></tr>";
		while($row = mysqli_fetch_assoc($res2)){
			$tid = $row['id'];
			$title = $row['topic_title'];
			$views = $row['topic_views'];
			$date = $row['topic_date'];
			$creator = $row['topic_creator'];

			$topics .="<tr><td><a class='topic_title' href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br /><span class='post_info'>Posted by:
			".$creator." on ".$date."</span></td><td align='center'>0</td><td align='center'>".$views."</td></tr>";
			$topics .="<tr><td colspan='3'><hr /></td></tr>";
		}
		$topics .="</table>";
		echo $topics;



	}else{
		echo "<a href='homepage.php'>Return to Homepage</a><hr />";
	echo "<p>No topics in this category yet.".$logged."</p>";
	}

}else{
	echo "<a href='homepage.php'>Return to Homepage</a><hr />";
	echo "<p>You are trying to view a category that does not exist yet.";
}


?>
</body>
</html>