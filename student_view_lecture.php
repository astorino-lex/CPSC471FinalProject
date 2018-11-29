<?php
	session_start();
	$course_name = $_SESSION['c_name'];
	$course_id = $_SESSION['c_id'];
	$lecture_num = $_POST['lecture_num'];
	
	$sql = "Select content_title from lecture_help where lecture_num=".$lecture_num.";";
	echo $sql;
	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);
	
	if($query)
	{
		$row = $query->fetch_assoc();
		$title = $row['content_title'];
		$directory = 'data/'.$course_name.$course_id.'/lectures/'.$title;
		//$title = "data/cpsc471/assignment/Alexa_old.jpg";
		header("Content-type: application/pdf;");
		header("Content-Disposition: inline; filename=".$title);
		@readfile($directory);
	}
	
	?>