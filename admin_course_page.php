<html>
<body>

<?php
	
	session_start();
	$course_name  = $_POST['course_name'];
	$course_id  = $_POST['course_id'];
	print "<h3>";
	echo $course_name;
	print "</h3>";
	
	$servername = "localhost";
	$databasename = "cpsc471Project";
	$username = "dylan";
	$password = "password";
	
	$conn = new mysqli($servername, $username, $password, $databasename);
	
	$sql = "Select * from course_content where course_name = '".$course_name."' AND course_id ='".$course_id."'";
	
	$query = $conn->query($sql);
	
	if($query->num_rows > 0)
	{
		
	}
?>

</body>
</html>