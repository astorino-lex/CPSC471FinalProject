<html>
	<head>
		<title>
			Notifications
		</title>
	</head>

	<?php
	session_start();
	$student_name = $_SESSION['studentname'];
	$sql = "Select * from recieves where user_email = '".$student_name."'";



	$servername = "127.0.0.1";
		$databasename = "cpsc471project";
		$username = "dylan";
		$password = "password";

		$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);

	if($query)
	{
		echo "Notifications:";
		print "<br>";
		$row_num = $query->num_rows;
		$tmp = 1;
		while($row = $query->fetch_assoc())
		{
			print "<br>";

			echo "Notification #";
			echo $tmp;
			print "<br>";
			$sql2 = "Select * from notification where id=".$row['notification_id'];
			$query2= $conn->query($sql2);
			if($query2->num_rows > 0)
			{
				while($row2 = $query2->fetch_assoc())
				{
          echo "Course: ";
					echo $row2['course_name'];
          echo " ";
					echo $row2['course_id'];
          print "<br>";

          echo "Date received: ";
          echo $row2['month'];
          echo " ";
          echo $row2['day'];
          echo ", ";
          echo $row2['year'];
          print "<br>";
          echo "Time received: ";
          echo $row2['hours'];
          echo ":";
          echo $row2['minute'];

          print "<br>";
					echo "Subject: ";
					echo $row2['subject'];
					print "<br>";
					echo "Message: ";
					echo $row2['message'];
          print "<br>";
          print "<br>";

				}
			}
			$tmp = $tmp + 1;
		}
	}



	?>
	<button onclick="history.go(-1);">Back To Home Page </button>

</html>
