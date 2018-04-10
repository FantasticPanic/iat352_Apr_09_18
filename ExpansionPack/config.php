<?php
//connect to the database
$db = mysqli_connect("localhost", "root", "", "myNBAproject") or die ("unable to connect");

mysqli_select_db($db,"sample");

?>