<?php
session_start();

?>
<?php
if((!isset($_SESSION['username'])) || ($_GET['cid'] == "")){
	header("Location:homepage.php");
	exit();
}

$cid = $_GET['cid'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Forum</title>
	<link href="css/styles2.css" rel="stylesheet" type = "text/css" >
</head>
<body>
	<h2>Create New Topic</h2>

	<?php
	echo "<p>You are logged in as ".$_SESSION['username']." &bull; <a href='logout.php'>Logout</a>";


	?>
	<hr />
	<div id= "content">
	<form action="create_topic_parse.php" method="post">
		<p>Topic Title</p>
		<input type="text" name="topic_title" maxlength="150"/>
		<p>Topic Content</p>
		<textarea name="topic_content" rows="5" cols="75"></textarea>
		<br /><br />
		<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
			<input type="submit" name="topic_submit" value="Create Topic" />
		</form>
	</div>


</body>
</html>




