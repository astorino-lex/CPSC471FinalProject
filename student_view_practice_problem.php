<?php
	session_start();
	$course_name = $_SESSION['c_name'];
	$course_id = $_SESSION['c_id'];
	$practice_num = $_POST['practice_id'];

	$sql = "Select * from practice_problems as p, course_content as c where p.practice_id=".$practice_num." AND p.content_title = c.title AND p.content_id = c.id AND c.course_name = '".$course_name."' AND c.course_id =".$course_id." AND c.approval_status = 1;";

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
		$directory = 'data/'.$course_name.$course_id.'/practiceproblems/'.$title;
		//$title = "data/cpsc471/assignment/Alexa_old.jpg";
		header("Content-type: application/pdf;");
		header("Content-Disposition: inline; filename=".$title);
		@readfile($directory);
	}
	else{
		$_SESSION['practice_invalid'] = TRUE;
		header("Location:student_practice_problems.php");
	}

	?>
