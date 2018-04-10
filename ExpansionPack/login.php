<?php
session_start();	
require "config.php";
require "header.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link href="css/styles2.css" rel="stylesheet" type = "text/css" >
</head>
<body>
	
	<div id = "main-wrapper">
		<h2>Login Form</h2>
	

	<form action = "login.php" method = "post">
		
		<label>Username: </label>
		<input name ="username" type = "text" class = "inputvalues" placeholder = "Type your username" required/><br>
		
		<label>Password: </label>
		<input name= "password" type = "password" class = "inputvalues" placeholder = "Type your password" required/><br><br>
		

		<input name= "login" type="submit" id= "login_btn" value= "Login"><br>
		<a href="registration2.php"><input type="button" id= "register_btn" value= "Register"></a>
</form>
<?php  
if(isset($_POST['login']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$encrypted_password= md5($password);

	//query the database if the username and password exist
	$query = "SELECT * FROM members WHERE username = '$username' AND password = '$encrypted_password'";

	$query_run = mysqli_query($db, $query);
	
	if(mysqli_num_rows($query_run)>0)
	{
		//if the user is in the database
		$_SESSION['username'] = $username;
		header('location: homepage.php');
	}
	else
	{
		//if the user cannot be found
		echo '<script type = "text/javascript"> alert("user not found")</script>';
	}


 }
?>
</div>
</body>
</html>