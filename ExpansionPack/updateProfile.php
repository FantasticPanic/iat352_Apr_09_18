<?php
session_start();
include_once("config.php");

$query= "UPDATE members SET firstName='$_POST[firstName]',lastName='$_POST[lastName]',username='$_POST[username]',favTeam='$_POST[favTeam]'";

if(mysqli_query($db,$query))
	header("refresh:1; url=profile.php");
	else
		echo "Did not update";
?>