<html>
	<head>
		<title>
			Select Course
		</title>
	</head>

	<?php
	session_start();
	$student_name = $_SESSION['studentname'];
	$sql = "Select * from favourites where user_email = '".$student_name."'";


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
			echo ", Course id: ".$row['course_id'];
			$course_list[$counter] = $row['course_name'];
			$course_id_list[$counter] = $row['course_id'];
			$counter = $counter + 1;
			?>


			<?php

		}
	}
	else{
		print "<br>";
		echo "No courses to display yet...";
		echo "<script type='text/javascript'>alert('You have not favourited any courses yet!')</script>";
	}
	?>

	<form action=student_course_page.php method=POST
          style="padding-top:80px;text-align:center;font-family:impact;font-size:120%;color:black;">
  	   Course Name: <input type=TEXT name="course_name"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:15%;"><BR>
  	   Course ID: <input type=TEXT name="course_id"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:10%;"><P>
  	  <input type=SUBMIT value="Select Course" style="font-family:impact;font-size:90%;width:10%;"><P>
	   </form>

		 <input type="button" value="Go back to homepage" onclick="location='process_form.php'"
				 style="margin-left: 40%;font-family:impact;font-size:90%;width:15%;"/><P>


</html>
