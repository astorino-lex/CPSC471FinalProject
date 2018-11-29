<?php
	session_start();
	$course_name = $_SESSION['c_name'];
	$course_id = $_SESSION['c_id'];
	$lab_num = $_POST['lab_num'];
	
	$sql = "Select content_title from lab_help where lab_num=".$lab_num.";";
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
		$directory = 'data/'.$course_name.$course_id.'/lab/'.$title;
		//$title = "data/cpsc471/assignment/Alexa_old.jpg";
		header("Content-type: application/pdf;");
		header("Content-Disposition: inline; filename=".$title);
		@readfile($directory);
	}
	
	?>