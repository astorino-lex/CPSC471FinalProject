<?php
	ob_start();
	session_start();
	$admin_email = $_SESSION['admin_name'];

	$banned_user = $_POST['unban_user_email'];


	$servername = $_SESSION['servername'];
	$databasename = $_SESSION['databasename'];
	$username = $_SESSION['username_db'];
	$password = $_SESSION['password_db'];

	$conn = new mysqli($servername, $username, $password, $databasename);

	$conn = new mysqli($servername, $username, $password, $databasename);


	$sqlValidUser = "Select * from student where user_email = '".$banned_user."'";
	$querycheck = $conn->query($sqlValidUser);


	$sqlbanned = "Select * from bans where stud_email = '".$banned_user."'";
	$querybanned = $conn->query($sqlbanned);

	if ($querybanned->num_rows <= 0){
		$_SESSION['not_banned'] = TRUE;
	}

	if ($querycheck->num_rows <= 0){
		$_SESSION['unvalid_email'] = TRUE;
	}

	if ($_SESSION['unvalid_email'] == FALSE && $_SESSION['not_banned'] == FALSE){
		$sql = "DELETE FROM BANS WHERE stud_email='".$banned_user."';";
		$query = $conn->query($sql);
	}

	header("Location:admin_ban_student_page.php");

?>
