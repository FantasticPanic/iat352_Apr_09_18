<?php
	require_once("config.php");
	session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link href="css/styles2.css" rel="stylesheet" type = "text/css" >
</head>
<body>
	
	<div id = "main-wrapper">
		<h2>Registration Form</h2>
	

	<form action = "registration2.php" method = "post">
		<label>First Name: </label>
		<input name = "firstName" type = "text" class = "inputvalues" placeholder = "Type your first name" required /><br>
		<label>Last Name: </label>
		<input name= "lastName"type = "text" class = "inputvalues" placeholder = "Type your last name" required/><br>
		<label>Username: </label>
		<input name= "username"type = "text" class = "inputvalues" placeholder = "Type your username" required/><br>
		<label>Email: </label>
		<input name= "email" type = "text" class = "inputvalues" placeholder = "Type your email" required/><br>
		
		<label>Select Your Favorite Team</label>
		<select class = "faveTeam" name="faveTeam">
			<option value = "Atlanta Hawks">Atlanta Hawkes</option>
			<option value = "Boston Celtics">Boston Celtics</option>
			<option value = "Brooklyn Nets">Brooklyn Nets</option>
			<option value = "Charlotte Hornets">Charlotte Hornets</option>
			<option value = "Chicago Bulls">Chicago Bulls</option>
			<option value = "Cleveland Cavaliers">Cleveland Cavaliers</option>
			<option value = "Dallas Mavericks">Dallas Mavericks</option>
			<option value = "Denver Nuggets">Denver Nuggets</option>
			<option value = "Detroit Pistons">Detroit Pistons</option>
			<option value = "Golden State Warriors">Golden State Warriors</option>
			<option value = "Houston Rockets">Houston Rockets</option>
			<option value = "Indiana Pacers">Indiana Pacers</option>
			<option value = "LA Clippers">LA Clippers</option>
			<option value = "Los Angeles Lakers">Los Angeles Lakers</option>
			<option value = "Memphis Grizzlies">Memphis Grizzlies</option>
			<option value = "Miami Heat">Miami Heat</option>
			<option value = "Milwaukee Bucks">Milwaukee Bucks</option>
			<option value = "Minnesota Timberwolves">Minnesota Timberwolves</option>
			<option value = "New Orleans Pelicans">New Orleans Pelicans</option>
			<option value = "New York Knicks">New York Knicks</option>
			<option value = "Oklahoma City Thunder">Oklahoma City Thunder</option>
			<option value = "Orlando Magic">Orlando Magic</option>
			<option value = "Philadelphia 76ers">Philadelphia 76ers</option>
			<option value = "Pheonix Suns">Pheonix Suns</option>
			<option value = "Portland Trail Blazers">Portland Trail Blazers</option>
			<option value = "Sacremento Kings">Sacremento Kings</option>
			<option value = "San Antonio Spurs">San Antonio Spurs</option>
			<option value = "Toronto Raptors">Toronto Raptors</option>
			<option value = "Utah Jazz">Utah Jazz</option>
			<option value = "Washington Wizards">Washington Wizards</option>
		</select><br>
		
		<label>Password: </label>
		<input name= "password" type = "password" class = "inputvalues" placeholder = "Type your password" required /><br>
		<label>Confirm Password: </label>
		<input name= "cpassword"type = "password" class = "inputvalues" placeholder = "Re-type your password" required/><br><br>
		<input type="hidden" id="dateCreated" name="dateCreated"/>

		

		<input name= "createacct_btn" type="submit" id= "createacct_btn" value= "Create Account"/><br>
		<a href="login.php"><input name = "back_btn" type="button" id= "back_btn" value= "<< Go Back to Login"/></a>

</form>

<?php

//will check whether or not the create account button is pressed
if(isset($_POST['createacct_btn'])){
	//echo '<script type = "text/javascript"> alert("TEST IF THIS WORKS") </script>';
	

	 $firstName = $_POST['firstName'];
	 $lastName	= $_POST['lastName'];
	 $username = $_POST['username'];
	 $email = $_POST['email'];
	 $password = $_POST['password'];
	 $cpassword = $_POST['cpassword'];
	 $faveTeam = $_POST['faveTeam'];

	 $encrypted_password = md5($password);
	 
	 

	 //check the first password and confirmed password, see if they match
	 // make a query on the database
	if($password == $cpassword){
			$query= "SELECT * FROM members WHERE username='$username'";

			//pass in connection variable from config.php and query
			$query_run = mysqli_query($db,$query);

			//checks number of rows when the query was executed
			
			if($query_run)
			{

			if(mysqli_num_rows($query_run)>0)
			{
				//if this username already exists
				echo '<script type = "text/javascript"> alert("This username already exists")</script>';

			}
			else
			{
				//inserts values into MySQL database
				$query = "INSERT INTO members VALUES (NULL, '$firstName','$lastName','$username', '$email','$faveTeam', CURRENT_DATE, '$encrypted_password')";
				$query_run = mysqli_query($db, $query);

				//if it runs sucessfully
				if($query_run)
				{ 
					echo "<script type = 'text/javascript'> alert('Account registered in database')</ script>";
					//$_SESSION['username'] = $username;
					//header('location: homepage.php');
					}
				else
				{ 
					echo '<script type= "text/javascript"> alert("Oops! There was an error in the database") </script>';

				}
			}
	
	}
	else {

		echo '<script type= "text/javascript"> alert("Database Error") </script>';
	}
}
else{

	echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
	}
}

?>
</div>
</body>
</html>