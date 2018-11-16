<html>

Approve content using mysql script here:

<br>
<embed src="Assignment4.pdf" width=800 height=1000	/>


<?php 

	$content_title = $_POST['content_title'];
	$content_id = $_POST['content_id'];
	
	$sql = "Update content set approval_status = 'approved' WHERE title = '".$content_title."' AND id=".$content_id.";";
	
	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$conn->query($sql);
	
?>

</html>