<?php
	ob_start();
	session_start();
	$content_id = $_POST['content_id'];


	$servername = $_SESSION['servername'];
	$databasename = $_SESSION['databasename'];
	$username = $_SESSION['username_db'];
	$password = $_SESSION['password_db'];

	$conn = new mysqli($servername, $username, $password, $databasename);


	$sqlValidContent = "Select * from course_content where id = '".$content_id."'";
	$resultCheck = $conn->query($sqlValidContent);

	if ($resultCheck->num_rows <= 0){
		$_SESSION['$invalidID'] = TRUE;
	}

	$sqlApprovedContent = "Select * from course_content where id = '".$content_id."' AND approval_status = 1";
	$resultApprovedCheck = $conn->query($sqlApprovedContent);

	if ($resultApprovedCheck->num_rows > 0){
		$_SESSION['approved_already'] = TRUE;
	}

	if ($_SESSION['approved_already'] == FALSE && $_SESSION['$invalidID'] == FALSE ){
		$sql = "UPDATE course_content SET approval_status='1' WHERE id=".$content_id.";";
		$conn->query($sql);

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

		$sql6 = "Insert into notification (message, subject, month, day, year, hours, minute, course_name, course_id) values('new content added to a course you have favourited', 'new content added', '".$month."', ".$day.", ".$year.", ".$hour.", ".$minute.", '".$_SESSION['c_name']."', ".$_SESSION['c_id'].");";
		$query6= $conn->query($sql6);

		$sql7 = "Select * from notification WHERE course_name = '".$_SESSION['c_name']."' AND course_id = ".$_SESSION['c_id']." AND subject = 'new content added' AND month = '".$month."' AND day = ".$day." AND year = ".$year." AND hours = ".$hour." AND minute = ".$minute;
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
		if ($query8 ->num_rows >0){
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
				$sql16 = "Select * from student_notifications WHERE notification_id = ".$notify_id;
				$query16 = $conn->query($sql16);
				$temp = $query16 ->fetch_assoc();
				$email_list = $temp['email_list'];
			}
		}
	}


	header("Location:admin_course_page.php");
?>
