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
$tid = $_GET['tid'];
$sql = "SELECT * FROM topics WHERE cat_id='".$cid."' AND id='".$tid."' LIMIT 1";
$res = mysqli_query($db, $sql) or die("hello error1");
if(mysqli_num_rows($res) == 1){
	echo "<table width='100%'>";
	if($_SESSION['username']) {
		echo "<tr><td colspan='2'><input type='submit' value='Add Reply' onClick=\"window.location =
		'post_reply.php?cid=".$cid."&tid=".$tid."'\" /><hr />";
	}else{ 
		echo "<tr><td colspan='2'><p>Please log in first.</p><hr />
		</td></tr>";

		}
		while ($row = mysqli_fetch_assoc($res)){
			$sql2 = "SELECT * FROM posts WHERE cat_id='".$cid."' AND topic_id='".$tid."'";
			$res2 = mysqli_query($db, $sql2) or die("hello error2");
			while($row2 = mysqli_fetch_assoc($res2)){
				echo "<tr><td valign='top' style='border: 1px solid #000000;'><div style='min-height: 125px;'>".$row['topic_title']."<br />
				by ".$row2['post_creator']." - ".$row2['post_date']."<hr />".$row2['post_content']."</div></td><td width='200' valign='top'
				align='center' style='border: 1px solid #000000;'>User Info Here</td></tr><tr><td colspan='2'><hr /></td></tr>";
			}



			$old_views = $row['topic_views'];
			$new_views = $old_views + 1;
			$sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE cat_id='".$cid."' AND id='".$tid."' LIMIT 1";
			$res3 = mysqli_query($db, $sql3) or die("hello error3");
		}
		echo "</table>";
	}else{
			echo "<p>This topic does not exist.</p>";
		}
	









?>


</body>
</html>