<?php
session_start();

?>
<?php
if((!isset($_SESSION['username'])) || ($_GET['cid'] == "")){
	header("Location:homepage.php");
	exit();
}

$cid = $_GET['cid'];
$tid = $_GET['tid'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Forum</title>
	<link href="css/styles2.css" rel="stylesheet" type = "text/css" >
</head>
<body>
	<h2>Add Reply</h2>

	<?php
	echo "<p>You are logged in as ".$_SESSION['username']." &bull; <a href='logout.php'>Logout</a>";


	?>
	<hr />
	<div id= "content">
	<form action="post_reply_parse.php" method="post">
		<p>Reply Content</p>
		<textarea name="reply_content" rows="5" cols="75"></textarea>
		<br /><br />
		<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
		<input type="hidden" name="tid" value="<?php echo $tid; ?>" />
			<input type="submit" name="reply_submit" value="Add Reply" />
		</form>
	</div>


</body>
</html>



