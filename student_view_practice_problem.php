<?php
	session_start();
	$course_name = $_SESSION['c_name'];
	$course_id = $_SESSION['c_id'];
	$practice_num = $_POST['practice_id'];
	
	$sql = "Select content_title from practice_problems where id=".$practice_num.";";
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
		$directory = 'data/'.$course_name.$course_id.'/practiceproblems/'.$title;
		//$title = "data/cpsc471/assignment/Alexa_old.jpg";
		header("Content-type: application/pdf;");
		header("Content-Disposition: inline; filename=".$title);
		@readfile($directory);
	}
	
	?>