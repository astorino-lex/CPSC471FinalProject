<html>

	Remove the content from the database here:
	
	<?php 

	$content_title = $_POST['content_title'];
	$content_id = $_POST['content_id'];
	
	$sql = "DELETE FROM content WHERE title = '".$content_title."' AND id=".$content_id.";";
	
	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$conn->query($sql);
	
?>

</html>