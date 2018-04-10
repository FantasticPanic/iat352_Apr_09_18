<?php
//resumes the current session based via passed cookie
session_start();
//associative array with valid_user array
if( isset($_SESSION['username']))
	$valid_user = $_SESSION['username'];

else
	$valid_user = $_SESSION['username'] = [];

//connect to databse classicmodels
$db = connectToDB('localhost', 'root', '', 'myNBAproject');

//function for host,user,password nad database variables
function connectToDB($dbHost, $dbUser, $dbPass, $dbData) {
    $connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbData);
    //check the connection of the database
    if (mysqli_connect_errno()) {
        //quit and display error and error number
        die("Database connection failed:" .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno() . ")"
        );
    }
    return $connection;
}
//add the array to an object and return he object as JSON

//Function will get the productLine (type of the vehicle ) from the product table
// create a prepared statement for the product code of each model
function get_visited_players($visited) {
	global $db;
	$query = "SELECT team FROM playerstats WHERE id = ?"; 
			  
	$stmt = $db->prepare($query);
	$stmt->bind_param('s',$playerstats);
	$stmt->bind_result($player);
	
	//create an array for productLine
	$productLine = [];
	foreach($visited as $playerstats=>$times) {
		$stmt->execute();
		$stmt->fetch();
	//increment through the productLine

		if (isset($team[$plyer])) 
			$productLine[$model] +=$times;
		else
			$productLine[$model] = $times;
	}
	$stmt->free_result();
	return $productLine;
}
	
//function that checks if a model has been clicked and checked.	
function get_visited_models_in_products($visited,$productLine) {
	global $db;
	//Get the name of the product
	$query_str = "SELECT player FROM products WHERE productCode = ? AND productLine = ?"; 
	$stmt = $db->prepare($query_str);
	$stmt->bind_param('ss',$products,$productLine);
	$stmt->bind_result($pName);
	
	$modelProducts = [];
	foreach($visited as $products=>$times) {
		$stmt->execute();
		if ($stmt->fetch()) $modelProducts[$pName] = $times ;
	}
	$stmt->free_result();
	return $modelProducts ;
