<?php
	ob_start();
	session_start();
	?>
	<html>
	<?php
	$course_name = $_SESSION['c_name'];
	$course_id = $_SESSION['c_id'];
	$practice_num = $_POST['practice_id'];

	$_SESSION['practice_invalid'];

  $sql = "Select * from practice_problems as p, course_content as c where p.practice_id=".$practice_num." AND p.content_title = c.title AND p.content_id = c.id AND c.course_name = '".$course_name."' AND c.course_id =".$course_id." AND c.approval_status = 1;";

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);
	$rowupdate = $query->fetch_assoc();

	if($query->num_rows > 0)
	{

		$sqlupdate = "UPDATE course_content SET report_status = 1 WHERE id = ".$rowupdate['content_id'].";";
		$queryupdate = $conn->query($sqlupdate);


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

    $sql2 = "Insert into notification (message, subject, month, day, year, hours, minute, course_name, course_id) values('Content pending review: Practice #".$practice_num."', 'content was reported', '".$month."', ".$day.", ".$year.", ".$hour.", ".$minute.", '".$course_name."', ".$course_id.");";
    $query2 = $conn->query($sql2);

    $sql3 = "Select * from notification WHERE course_name = '".$course_name."' AND course_id = ".$course_id." AND subject = 'content was reported' AND month = '".$month."' AND day = ".$day." AND year = ".$year." AND hours = ".$hour." AND minute = ".$minute;
    $query3 = $conn->query($sql3);
    $row = $query3->fetch_assoc();
		$notify_id = $row['id'];

    $sql4 = "Select * from course WHERE course_name = '".$course_name."' AND id = ".$course_id;
    $query4 = $conn->query($sql4);
    while($row4 = $query4->fetch_assoc()){
      $sql5 = "Insert into admin_notifications (notification_id, email) values(".$notify_id.", '".$row4['user_email']."');";
      $query5 = $conn->query($sql5);

      $sql6 = "Insert into recieves (notification_id, user_email) values(".$notify_id.", '".$row4['user_email']."');";
      $query6 = $conn->query($sql6);
    }

    header("Location:student_practice_problems.php");
	}
	else{
		$_SESSION['practice_invalid'] = TRUE;
		header("Location:student_practice_problems.php");
	}

	?>
</html>
