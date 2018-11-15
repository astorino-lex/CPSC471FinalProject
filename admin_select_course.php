<html>
	<head>
		<title>
			Select Course
		</title>
	</head>
	
	<?php
	session_start();
	$admin_name = $_SESSION['adminname'];
	$sql = "Select * from course where user_email = '".$admin_name."'";
	
	
	$servername = "localhost";
		$databasename = "cpsc471Project";
		$username = "dylan";
		$password = "password";
		
		$conn = new mysqli($servername, $username, $password, $databasename);
		
	$query = $conn->query($sql);
	if($query->num_rows > 0)
	{
		echo "Courses:";
		print "<br>";
		$counter  = 0;
		while($row = $query->fetch_assoc())
		{
			print "<br>";
			$course_list[$counter] = $row['course_name'];
			$counter = $counter + 1;
			//echo $row['course_name'];
			//?>
			<input type="button" value=<?php echo $row['course_name'] ?> name=<?php echo $row['course_name'] ?> onclick="location='admin_course_page.php' <?php $_SESSION['course_name'] = name ?>" />
			<br>
			<?php
			
		}
	}
	
	
	?>
	
	
</html>