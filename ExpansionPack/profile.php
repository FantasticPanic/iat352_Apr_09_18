<!--WARNING, UPDATING AN ATTRIBUTE ON ONE OF  THE PROFILES ACCOUNT WILL CHANGE THE SAME ATTRIBUTES OF EVERY OTHER ACCOUNT 

THIS PAGE IS CONSIDERED A DATABASE SUICE. PROCEED WITH CAUTION
-->


<?php  
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Page</title>
	<link href="css/styles2.css" rel="stylesheet" type = "text/css" >
	
	<!--Reference header and connection to DB-->
	<?php
		include_once("header.php");
		include_once("config.php");
	?>
</head>

<body>
	<?php

	//query will look
	$query = "SELECT * FROM members WHERE id=?";
	$records = mysqli_query($db,$query);
	
	$stmt = $db->prepare($query);
	$stmt->bind_param('s',$mid);
	$stmt->execute();
	$stmt->bind_result($,$pName1,$model1,$pVendor1,$pScale,$MSRP,$pDesc1);
	?>
	
	<div id = "main-wrapper">
		<h2><a href="homepage.php"> Homepage</a></h2>
		
		<!-- <h3>You are now logged in -->
		<!-- <?php  
			//echo $_SESSION ['username']; 
		?> -->
	
		
		<?php
		
		if(isset($_SESSION['username'])){
		
			/*$firstName = $_POST['firstName'];
		 	$lastName	= $_POST['lastName'];
	 		$username = $_POST['username'];
			$email = $_POST['email'];
	 		$password = $_POST['password'];
	 		$cpassword = $_POST['cpassword'];
	 		$faveTeam = $_POST['faveTeam'];*/
			echo "Your username is  ", $_SESSION['username'];

		
			while ($row= mysqli_fetch_array($records)){

			echo "<tr><form action='updateProfile.php' method=post>";
			echo "<label> First Name </label><td><input type=text name=firstName value='".$row['firstName']."'></td>";
			echo "<label> Last Name </label><td><input type=text name=lastName value='".$row['lastName']."'></td>";
			echo "<label> Username </label><td><input type=text name=username value='".$row['username']."'></td>";
			echo "<label> Favourite Team </label><td><input type=text name=favTeam='".$row['favTeam']."'></td>";
			echo "<td><input type=submit value='Update'>";
			echo "</form></tr>";
		}
			//echo "Your email is ", $_POST['email'];
			
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



</body>
</html>