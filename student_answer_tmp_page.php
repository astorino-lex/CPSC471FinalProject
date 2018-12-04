<?php
	ob_start();
	session_start();
 ?>

<html>

<?php
	$student_email = $_SESSION['studentname'];
  $answer_unvalid = $_SESSION['answer_unvalid'];

	$answer = $_POST['answer'];
  $q_id = $_POST['q_id'];

	$sql = "Select * from end_user where user_email = '".$student_email."';";

  $sqlcheck = "Select * from question where q_id = ".$q_id." AND course_id = ".$_SESSION['c_id']." AND course_name = '".$_SESSION['c_name']."';";

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);
  $querycheck = $conn->query($sqlcheck);

	if ($querycheck->num_rows > 0)
	{
		$s_name = $query->fetch_assoc();

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

		$sql2 = "INSERT INTO answer	(`course_id`, `course_name`, `q_id`, `stud_name`, `content`, `hours`, `minutes`, `day`, `month`, `year`) VALUES (".$_SESSION['c_id'].", '".$_SESSION['c_name']."', ".$q_id.", '".$s_name['first_name']."', '".$answer."', ".$hour.", ".$minute.", ".$day.", '".$month."', ".$year.");";

		$query2 = $conn->query($sql2);
		$sql3 = "Select * from course where id =".$_SESSION['c_id'].";";
		$query3 = $conn->query($sql3);
		$cid = $query3->fetch_assoc();
		$num_a = ($cid['num_answers']+1);
		$sql4 = "UPDATE course SET num_answers = ".$num_a." WHERE id = ".$_SESSION['c_id'].";";
		$query4 = $conn->query($sql4);
		$sql5 = "INSERT INTO posts_on	(`course_id`, `course_name`, `user_email`) VALUES (".$_SESSION['c_id'].", '".$_SESSION['c_name']."', '".$student_email."');";
		$query5 = $conn->query($sql5);

		$sql6 = "Insert into notification (message, subject, month, day, year, hours, minute, course_name, course_id) values('new answer to a question on forum posted', 'forum activity', '".$month."', ".$day.", ".$year.", ".$hour.", ".$minute.", '".$_SESSION['c_name']."', ".$_SESSION['c_id'].");";
		$query6= $conn->query($sql6);

		$sql7 = "Select * from notification WHERE course_name = '".$_SESSION['c_name']."' AND course_id = ".$_SESSION['c_id']." AND subject = 'forum activity' AND month = '".$month."' AND day = ".$day." AND year = ".$year." AND hours = ".$hour." AND minute = ".$minute;
		$query7 = $conn->query($sql7);
		$row = $query7->fetch_assoc();
		$notify_id = $row['id'];

		$sql8 = "Select * from favourites WHERE course_name = '".$_SESSION['c_name']."' AND course_id = ".$_SESSION['c_id'];
		$query8 = $conn->query($sql8);

		while($row8 = $query8->fetch_assoc()){
			$sql10 = "Insert into recieves (notification_id, user_email) values(".$notify_id.", '".$row8['user_email']."');";
			$query10 = $conn->query($sql10);
		}

		$sql11 = "Select * from recieves WHERE notification_id = ".$notify_id;
		$query11 = $conn->query($sql11);
		$sql8 = "Select * from favourites WHERE course_name = '".$_SESSION['c_name']."' AND course_id = ".$_SESSION['c_id'];
		$query8 = $conn->query($sql8);
		$row8 = $query8->fetch_assoc();
		$sql9 = "Insert into student_notifications (notification_id, email_list) values(".$notify_id.", '".$row8['user_email']."');";
		$query9 = $conn->query($sql9);
		$sql16 = "Select * from student_notifications WHERE notification_id = ".$notify_id;
		$query16 = $conn->query($sql16);
		$temp = $query16 ->fetch_assoc();
		$email_list = $temp['email_list'];
		while($row8 = $query8->fetch_assoc()){
			$sql5 = "UPDATE student_notifications SET email_list = '".$email_list.";".$row8['user_email']."' WHERE notification_id = ".$notify_id.";";
			$query15 = $conn->query($sql5);
		}

    $_SESSION['answer_unvalid'] = FALSE;
	}
  else{
    $_SESSION['answer_unvalid'] = TRUE;
  }

	header("Location:student_forum_page.php");

?>

</html>
