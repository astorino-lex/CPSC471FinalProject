<?php
	ob_start();
	session_start();
?>

<html>
	<head>
		<title>
		 	Favourite A Course
		</title>
	</head>

	<body style="background-color:crimson;">
		<p style="text-align:right;padding-top:75px;padding-right:50px;"><image src="logo.png" class="img-responsive" alt="centered image"
					height="100", width="300"></p>
			<input type="button" value="Back to Home Page" onclick="location='process_form.php'"
					style="margin-left: 80%;font-family:impact;font-size:90%;width:12%;color:black;"><P>
						<p style="text-align:left;margin-left:20%;font-family:impact;font-size:120%;color:black;">
									Courses Avaliable:
						</p>

<?php
	$student_name = $_SESSION['studentname'];
  $course_exists = $_SESSION['course_exists'];
  $fav_exists = $_SESSION['favourite_exists'];
  $checker = $_SESSION['favourite_checker'];

	$servername = $_SESSION['servername'];
	$databasename = $_SESSION['databasename'];
	$username = $_SESSION['username_db'];
	$password = $_SESSION['password_db'];

	$conn = new mysqli($servername, $username, $password, $databasename);

	$sql = "Select * from course";

	$query = $conn->query($sql);

	if($query)
	{

		while($row = $query->fetch_assoc())
		{
			?>
			<p style="text-align:left;border:2px solid black;border-radius: 5px;padding-left:20px;
				width:50%;margin-left:26%;font-family:impact;font-size:120%;color:black;">

			<?php
      echo "Course name: ".$row['course_name'];
			echo ", Course ID: ".$row['id'];
      echo ", Course title: ".$row['title'];
      print "<br>";
		}
	}
?>

<form action=student_favourite_course_tmp.php method=POST
        style="padding-top:40px;text-align:center;font-family:impact;font-size:120%;color:black;">
     Course Name: <input type=TEXT name="course_name"
        style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:15%";
        required><BR>
     Course ID: <input type=TEXT name="course_id"
        style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:10%;"
        required><P>
    <input type=SUBMIT value="Select Course" style="font-family:impact;font-size:90%;width:10%;"><P>

	 </form>

<?php

  if ($checker){
    $cname  = $_SESSION['course_name_input'];
    $id  = $_SESSION['course_id_input'];

    if($fav_exists && $course_exists)
  	{
      $_SESSION['favourite_exists'] = FALSE;
      $_SESSION['favourite_checker'] = FALSE;
      $_SESSION['course_exists'] = FALSE;
      echo "<script type='text/javascript'>alert('That course already exists in your favourites!')
			window.location = 'student_favourite_course.php';</script>";
  	}
  	else if (!$fav_exists && $course_exists)
  	{
      $_SESSION['favourite_exists'] = FALSE;
      $_SESSION['favourite_checker'] = FALSE;
      $_SESSION['course_exists'] = FALSE;

      $cname = strtoupper($cname);

      $sql2 = "Insert into favourites (course_name, course_id, user_email) ";
    	$sql2 = $sql2."values('".$cname."', ".$id.", '".$student_name."');";

      $query2 = $conn->query($sql2);
      if($query2)
      {
        echo "<script type='text/javascript'>alert('The course was successfully added to favourites!')
				window.location = 'process_form.php';</script>";
      }
      else
      {
        echo "<script type='text/javascript'>alert('The course was not added to favourites, please try again!')
				window.location = 'student_favourite_course.php';</script>";
      }
  	}
    else {
      $_SESSION['favourite_exists'] = FALSE;
      $_SESSION['favourite_checker'] = FALSE;
      $_SESSION['course_exists'] = FALSE;
      echo "<script type='text/javascript'>alert('The course entered does not exist!')
					window.location = 'student_favourite_course.php';</script>";
    }
  }
?>

</body>
</html>
