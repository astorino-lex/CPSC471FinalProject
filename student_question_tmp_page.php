<?php
	ob_start();
	session_start();
 ?>

<html>

<?php
	$student_email = $_SESSION['studentname'];

	$question = $_POST['question'];

	$sql = "Select * from end_user where user_email = '".$student_email."';";

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);

	if ($query)
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

		$sql2 = "INSERT INTO question	(`course_id`, `course_name`, `content`, `stud_name`, `hours`, `minutes`, `day`, `month`, `year`) VALUES (".$_SESSION['c_id'].", '".$_SESSION['c_name']."', '".$question."', '".$s_name['first_name']."', ".$hour.", ".$minute.", ".$day.", '".$month."', ".$year." );";

		$query2 = $conn->query($sql2);
		$sql3 = "Select * from course where id =".$_SESSION['c_id'].";";
		$query3 = $conn->query($sql3);
		$cid = $query3->fetch_assoc();
		$num_q = ($cid['num_questions']+1);
		$sql4 = "UPDATE course SET num_questions = ".$num_q." WHERE id = ".$_SESSION['c_id'].";";
		$query4 = $conn->query($sql4);
		$sql5 = "INSERT INTO posts_on	(`course_id`, `course_name`, `user_email`) VALUES (".$_SESSION['c_id'].", '".$_SESSION['c_name']."', '".$student_email."');";
		$query5 = $conn->query($sql5);

	}

	header("Location:student_forum_page.php");

?>

</html>
