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

	$sql = "Select a.content_title from assign_help as a AND course_content as c where a.assign_num=".$assign_num." ";
	$sql = $sql."AND a.content_title = c.content_title AND a.content_id = c.id AND c.course_name = '".$course_name."' ";
	$sql = $sql."AND c.course_id =".$course_id.";";
	//echo $sql;
	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

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
