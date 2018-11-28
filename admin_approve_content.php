<?php
	ob_start();
	session_start();
	$content_id = $_POST['content_id'];

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);


	$sqlValidContent = "Select * from course_content where id = '".$content_id."'";
	$resultCheck = $conn->query($sqlValidContent);

	if ($resultCheck->num_rows <= 0){
		$_SESSION['$invalidID'] = TRUE;
	}

	$sqlApprovedContent = "Select * from course_content where id = '".$content_id."' AND approval_status = 1";
	$resultApprovedCheck = $conn->query($sqlApprovedContent);

	if ($resultApprovedCheck->num_rows > 0){
		$_SESSION['approved_already'] = TRUE;
	}

	if ($_SESSION['approved_already'] == FALSE && $_SESSION['$invalidID'] == FALSE ){
		$sql = "UPDATE course_content SET approval_status='1' WHERE id=".$content_id.";";
		$conn->query($sql);
	}

	header("Location:admin_course_page.php");
?>
