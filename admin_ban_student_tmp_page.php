<?php
	ob_start();
	session_start();
	$admin_email = $_SESSION['admin_name'];
	$banned_user = $_POST['ban_user_email'];

	$sql = "INSERT INTO BANS Values('".$admin_email."', '".$banned_user."');";

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);

	header("Location:admin_ban_student_page.php");

?>
