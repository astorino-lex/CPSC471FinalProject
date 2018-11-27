<?php
	 ob_start();
	session_start();

	$admin_name = $_SESSION['user_email'];
	$course_name = $_POST['course_name'];
	$course_id = $_POST['course_id'];
	$course_title = $_POST['course_title'];
	$course_semester = $_POST['course_semester'];
	echo $course_name;
	echo $course_id;
	$sql = "Insert into course (course_name, id, title, semester, user_email, forum_id) ";
	$sql = $sql."values('".$course_name."', ".$course_id.", '".$course_title."', '".$course_semester."', '".$admin_name."',3);";

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	//$query = $conn->query($sql);

	if($conn->query($sql) === true)
	{
		print "it worked";
	}
	else
	{
		print "it didnt work";
	}
	header("Location:admin_select_course.php");

?>