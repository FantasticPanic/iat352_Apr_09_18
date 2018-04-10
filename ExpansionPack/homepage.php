<?php  
session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link href="css/styles2.css" rel="stylesheet" type = "text/css" >
	<?php
		include_once("header.php");
	?>
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
<h2>View Categories</h2>
<?php  

include_once("config.php");
$sql = "SELECT * FROM categories ORDER BY cat_title ASC";
$res = mysqli_query($db, $sql) or die("hello");

$categories = "";
if (mysqli_num_rows($res) > 0){
	while ($row = mysqli_fetch_assoc($res)){
		$id = $row['id'];
		$title = $row['cat_title'];
		$description = $row['cat_description'];
		$categories .= "<a href='view_category.php?cid=".$id."' class='cat_links'>".$title." - <font size='-1'>".$description."</font></a>";

	}
	echo $categories;
}else{
	echo "<p>No categories posted yet</p>";
}


?>
</body>
</html>