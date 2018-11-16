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
	// We can make this into a table to look better later...  for now this works
	if($query->num_rows > 0)
	{
		while($row = $query->fetch_assoc())
		{
			echo "id: ".$row['id'];
			echo ", title: ".$row['title'];
			echo ", format: ".$row['format'];
			echo ", report status: ".$row['report_status'];
			echo ", user email: ".$row['user_email'];
			echo ", approval status: ".$row['approval_status'];
			echo ", course id: ".$row['course_id'];
			echo ", course name: ".$row['course_name'];
		}
	}
	
	
?>

</body>
</html>