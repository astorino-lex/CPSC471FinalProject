<?php
	session_start();
 ?>

<html>
	<head>
		<title>
			Select A Course
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
	$admin_name = $_SESSION['admin_name'];
	$sql = "Select * from course where user_email = '".$admin_name."'";


		$servername = "127.0.0.1";
		$databasename = "cpsc471project";
		$username = "dylan";
		$password = "password";

		$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);
	if($query)
	{
		$counter  = 0;
		while($row = $query->fetch_assoc())
		{
			echo "Course name: ";
			echo $row['course_name'];
			echo ", Course id:&nbsp;&nbsp;".$row['id'];
			$course_list[$counter] = $row['course_name'];
			$course_id_list[$counter] = $row['id'];
			$counter = $counter + 1;
		}
	}
	?>

	<form action=admin_course_page.php method=POST
          style="text-align:center;font-family:impact;font-size:120%;color:black;">
  	   Course Name: <input type=TEXT name="course_name"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:15%;"
					required><BR>
  	   Course ID: <input type=TEXT name="course_id"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:10%;"
					required><P>
  	  <input type=SUBMIT value="Select Course" style="font-family:impact;font-size:90%;width:10%;"><P>

	   </form>

</html>
