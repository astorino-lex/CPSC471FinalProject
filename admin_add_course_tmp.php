<html>

<?php
	
	session_start();
	
	$admin_name = $_SESSION['admin_name'];
	$course_name = $_POST['course_name'];
	$course_id = $_POST['course_id'];
	$course_title = $_POST['course_title'];
	$course_semester = $_POST['course_semester'];
	
	$sql = "Insert into course (course_name, id, title, semester, user_email) ";
	$sql = $sql."values('".$course_name."', ".$course_id.", '".$course_title."', '".$course_semester."', '".$admin_name."');";
	
	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);
	
	$query = $conn->query($sql);
	
	if($query)
	{
		print "it worked";
	}
	else
	{
		print "it didnt work";
	}
	header("Location:admin_select_course.php");
	
?>

</html>