<?php
	ob_start();
	session_start();
	?>
	<html>
	<?php
	$course_name = $_SESSION['c_name'];
	$course_id = $_SESSION['c_id'];
	$assign_num = $_POST['assign_num'];

	$_SESSION['assignment_invalid'];

  $sql = "Select * from assign_help as a, course_content as c where a.assign_num=".$assign_num." AND a.content_title = c.title AND a.content_id = c.id AND c.course_name = '".$course_name."' AND c.course_id =".$course_id." AND c.approval_status = 1;";

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);

	if($query->num_rows > 0)
	{
    date_default_timezone_set("Canada/Mountain");
		$day = date("d");
		$year = date("Y");
		$month = date("m");

		if ($month == 1){
			$month = "January";
		}
		else if ($month == 2){
			$month = "February";
		}
		else if ($month == 3){
			$month = "March";
		}
		else if ($month == 4){
			$month = "April";
		}
		else if ($month == 5){
			$month = "May";
		}
		else if ($month == 6){
			$month = "June";
		}
		else if ($month == 7){
			$month = "July";
		}
		else if ($month == 8){
			$month = "August";
		}
		else if ($month == 9){
			$month = "September";
		}
		else if ($month == 10){
			$month = "October";
		}
		else if ($month == 11){
			$month = "November";
		}
		else{
			$month = "December";
		}

		$hour = date("h");
		$minute = date("i");

    $sql2 = "Insert into notification (message, subject, month, day, year, hours, minute, course_name, course_id) values('Content pending review: Assignment #".$assign_num."', 'content was reported', ".$month.", ".$day.", ".$year.", ".$hour.", ".$minute.", '".$course_name."', ".$course_id.");";
    $query2 = $conn->query($sql2);

    $sql3 = "Select * from notification course_name = '".$course_name."' AND a.course_id = ".$course_id." AND subject = 'content was reported' AND month, day, year, hours, minute,";
    $query3 = $conn->query($sql3);

    header("Location:student_assignment_help.php");
	}
	else{
		$_SESSION['assignment_invalid'] = TRUE;
		header("Location:student_assignment_help.php");
	}

	?>
</html>
