<?php
	ob_start();
	session_start();
	$content_id = $_POST['content_id'];


	$servername = $_SESSION['servername'];
	$databasename = $_SESSION['databasename'];
	$username = $_SESSION['username_db'];
	$password = $_SESSION['password_db'];

	$conn = new mysqli($servername, $username, $password, $databasename);

	$sqlValidContent = "Select * from course_content where id = ".$content_id;
	$resultCheck = $conn->query($sqlValidContent);

	if ($resultCheck->num_rows <= 0){
		$_SESSION['$invalidID'] = TRUE;
	}

	if ($_SESSION['$invalidID'] == FALSE){
		$sql = "DELETE FROM course_content WHERE id=".$content_id.";";
		$conn->query($sql);
	}

	header("Location:admin_course_page.php");

?>
