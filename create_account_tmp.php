<?php
  ob_start();
	session_start();
  
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $year_of_study = $_POST['year_of_study'];
	$user_email = $_POST['user_email'];
  $password = $_POST['password'];
  $degree_program = $_POST['degree_program'];
  $degree_program2 = $_POST['degree_program2'];
  $faculty = $_POST['faculty'];
  $faculty2 = $_POST['faculty2'];
  $_SESSION['studentname'] = $user_email;

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

  $sql = "Insert into end_user (user_email, password, first_name, last_name)";
	$sql = $sql."values('".$user_email."', '".$password."', '".$first_name."', '".$last_name."');";

	$query = $conn->query($sql);

  $sql = "Insert into student (user_email, year_of_study) ";
	$sql = $sql."values('".$user_email."', '".$year_of_study."');";

	$query = $conn->query($sql);

  $sql = "Insert into student_degree_programs (user_email, degree_program)";
  $sql = $sql."values('".$user_email."', '".$degree_program."');";

  $query = $conn->query($sql);

  $sql = "Insert into student_facultys (user_email, faculty)";
  $sql = $sql."values('".$user_email."', '".$faculty."');";

	$query = $conn->query($sql);

  if (isset($degree_program2)) {
    $sql = "Insert into student_degree_programs (user_email, degree_program)";
    $sql = $sql."values('".$user_email."', '".$degree_program2."');";
	$query = $conn->query($sql);
  }

  if (isset($faculty2)) {
    $sql = "Insert into student_facultys (user_email, faculty)";
    $sql = $sql."values('".$user_email."', '".$faculty2."');";
	$query = $conn->query($sql);
  }


	$_SESSION['user_email'] = $user_email;
	$_SESSION['password'] = $password;

  header("Location:process_form.php");
?>
