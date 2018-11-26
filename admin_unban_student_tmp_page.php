<?php
	ob_start();
	session_start();
	$admin_email = $_SESSION['admin_name'];

	$banned_user = $_POST['unban_user_email'];


	$sql = "DELETE FROM BANS WHERE stud_email='".$banned_user."';";

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);

	header("Location:admin_ban_student_page.php");

?>
