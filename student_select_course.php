	<?php
		session_start();
	?>

	<html>
		<head>
			<title>
				Student Select A Course
			</title>
		</head>

		<body style="background-color:crimson;">
			<p style="text-align:right;padding-top:75px;padding-right:50px;"><image src="logo.png" class="img-responsive" alt="centered image"
						height="100", width="300"></p>
				<input type="button" value="Back to Home Page" onclick="history.go(-1);"
						style="margin-left: 80%;font-family:impact;font-size:90%;width:12%;color:black;"><P>
							<p style="text-align:left;margin-left:20%;font-family:impact;font-size:120%;color:black;">
										Select A Course:
							</p>


	<?php
	$student_name = $_SESSION['studentname'];
	$course_unvalid = $_SESSION['course_unvalid'];

	$sql = "Select * from favourites where user_email = '".$student_name."'";


	$servername = "127.0.0.1";
	$databasename = "cpsc471Project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);
	if($query->num_rows > 0)
	{
		$counter  = 0;
		while($row = $query->fetch_assoc())
		{
			?>
			<p style="text-align:left;border:2px solid black;border-radius: 5px;padding-left:20px;
				width:40%;margin-left:26%;font-family:impact;font-size:120%;color:black;">

			<?php
			echo "Course name: ".$row['course_name'];
			echo ", Course ID: ".$row['course_id'];
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
		echo "<script type='text/javascript'>alert('You have not favourited any courses yet!')
			window.location = 'process_form.php';</script>";
	}


	if ($course_unvalid == TRUE){
		$_SESSION['course_unvalid'] = FALSE;
		echo "<script type='text/javascript'>alert('The course entered was either not favourited yet, or does not exist, please try again.')
		window.location = 'student_select_course.php';</script>";
	}
	?>

	<form action=student_select_course_tmp.php method=POST
          style="padding-top:40px;text-align:center;font-family:impact;font-size:120%;color:black;">
  	   Course Name: <input type=TEXT name="course_name"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:15%;"><BR>
  	   Course ID: <input type=TEXT name="course_id"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:10%;"><P>
  	  <input type=SUBMIT value="Select Course" style="font-family:impact;font-size:90%;width:10%;"><P>
	   </form>

</html>
