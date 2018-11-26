<?php
	ob_start();
	session_start();
	$content_title = $_POST['content_title'];
	$content_id = $_POST['content_id'];

	$sql = "UPDATE course_content SET approval_status='1' WHERE title = '".$content_title."' AND id=".$content_id.";";

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$conn->query($sql);

	header("Location:admin_course_page.php");
?>
