<html>
	<head>
		<title>
			Select Course
		</title>
	</head>
	
	<?php
	session_start();
	$admin_name = $_SESSION['admin_name'];
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
			echo "Course name: ".$row['course_name'];
			echo ", Course id: ".$row['id'];
			$course_list[$counter] = $row['course_name'];
			$course_id_list[$counter] = $row['id'];
			$counter = $counter + 1;
			?>
			
			
			<?php
			
		}
	}
	?>
	
	<form action=admin_course_page.php method=POST
          style="padding-top:80px;text-align:center;font-family:impact;font-size:120%;color:black;">
  	   Course Name: <input type=TEXT name="course_name"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:15%;"><BR>
  	   Course ID: <input type=TEXT name="course_id"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:10%;"><P>
  	  <input type=SUBMIT value="Select Course" style="font-family:impact;font-size:90%;width:10%;"><P>

        <!--BUTTONS-->
	   </form>
	
	
</html>