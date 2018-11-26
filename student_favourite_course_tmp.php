<?php
ob_start();
session_start();
 ?>

<html>

<?php
  $student_name = $_SESSION['studentname'];
  $course_exists = $_SESSION['course_exists'];
  $fav_exists = $_SESSION['favourite_exists'];
  $checker = $_SESSION['favourite_checker'];
  $c_name  = $_POST['course_name'];
  $c_id  = $_POST['course_id'];

  $_SESSION['course_name_input']= $c_name;
  $_SESSION['course_id_input']= $c_id;

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

  $sql = "Select * from favourites where course_id =".$c_id." AND course_name ='".$c_name."' AND user_email ='".$student_name."';";
	$query = $conn->query($sql);

  echo $sql;


  $sql2 = "Select * from course where id =".$c_id." AND course_name ='".$c_name."';";
	$query2 = $conn->query($sql2);

  echo $sql2;

	if($query->num_rows >0 && $query2->num_rows > 0)
	{
		$_SESSION['favourite_exists'] = TRUE;
    $_SESSION['favourite_checker'] = TRUE;
    $_SESSION['course_exists'] = TRUE;
	}
	else if ($query->num_rows <= 0 && $query2->num_rows > 0)
	{
    $_SESSION['favourite_exists'] = FALSE;
    $_SESSION['favourite_checker'] = TRUE;
    $_SESSION['course_exists'] = TRUE;
	}
  else
  {
    $_SESSION['favourite_exists'] = FALSE;
    $_SESSION['favourite_checker'] = TRUE;
    $_SESSION['course_exists'] = FALSE;
  }
	header("Location:student_favourite_course.php");

?>

</html>
