<html>
<body>

<?php

	session_start();
	$student_name = $_SESSION['studentname'];
  $course_exists = $_SESSION['course_exists'];
  $fav_exists = $_SESSION['favourite_exists'];
  $checker = $_SESSION['favourite_checker'];

	$servername = "127.0.0.1";
	$databasename = "cpsc471Project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$sql = "Select * from course";

	$query = $conn->query($sql);
	// We can make this into a table to look better later...  for now this works
	if($query)
	{
    print "<br>";
    echo "Courses avaliable:";
    print "<br>";

		while($row = $query->fetch_assoc())
		{
      print "<br>";
      echo "Course name: ".$row['course_name'];
			echo ", Course ID: ".$row['id'];
      echo ", Course title: ".$row['title'];
      print "<br>";
		}
	}
?>

<form action=student_favourite_course_tmp.php method=POST
        style="padding-top:80px;text-align:center;font-family:impact;font-size:120%;color:black;">
     Course Name: <input type=TEXT name="course_name"
        style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:15%";
        required><BR>
     Course ID: <input type=TEXT name="course_id"
        style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:10%;"
        required><P>
    <input type=SUBMIT value="Select Course" style="font-family:impact;font-size:90%;width:10%;"><P>

	 </form>

	 <input type="button" value="Go back to homepage" onclick="location='process_form.php'"
			 style="margin-left: 40%;font-family:impact;font-size:90%;width:15%;"/><P>

<?php

  if ($checker){
    $cname  = $_SESSION['course_name_input'];
    $id  = $_SESSION['course_id_input'];

    if($fav_exists && $course_exists)
  	{
      $_SESSION['favourite_exists'] = FALSE;
      $_SESSION['favourite_checker'] = FALSE;
      $_SESSION['course_exists'] = FALSE;
      echo "<script type='text/javascript'>alert('That course already exists in your favourites!')</script>";
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
        echo "<script type='text/javascript'>alert('The course was successfully added to favourites!')</script>";
      }
      else
      {
        echo "<script type='text/javascript'>alert('The course was not added to favourites, please try again!')</script>";
      }
  	}
    else {
      $_SESSION['favourite_exists'] = FALSE;
      $_SESSION['favourite_checker'] = FALSE;
      $_SESSION['course_exists'] = FALSE;
      echo "<script type='text/javascript'>alert('The course entered does not exist!')</script>";
    }
  }
?>

</body>
</html>
