<?php
	ob_start();
	session_start();
	?>
	<html>
	<?php
	$course_name = $_SESSION['c_name'];
	$course_id = $_SESSION['c_id'];
	$assign_num = $_POST['assign_num'];

	$_SESSION['assignment_invalid'];

	$sql = "Select * from assign_help as a, course_content as c where a.assign_num=".$assign_num." AND a.content_title = c.title AND a.content_id = c.id AND c.course_name = '".$course_name."' AND c.course_id =".$course_id." AND c.approval_status = 1;";

	$servername = $_SESSION['servername'];
	$databasename = $_SESSION['databasename'];
	$username = $_SESSION['username_db'];
	$password = $_SESSION['password_db'];

	$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);

	if($query->num_rows > 0)
	{
		$row = $query->fetch_assoc();
		$title = $row['content_title'];
		$directory = 'data/'.$course_name.$course_id.'/assignment/'.$title;
		header("Content-type: application/pdf;");
		header("Content-Disposition: inline; filename=".$title);
		@readfile($directory);
	}
	else{
		$_SESSION['assignment_invalid'] = TRUE;
		header("Location:student_assignment_help.php");
	}

	?>
</html>
