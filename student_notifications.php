<?php
session_start();
 ?>

<html>
	<head>
		<title>
			Student Notifications
		</title>
	</head>

	<body style="background-color:crimson;">
		<p style="text-align:right;padding-top:75px;padding-right:50px;"><image src="logo.png" class="img-responsive" alt="centered image"
					height="100", width="300"></p>
			<input type="button" value="Back to Home Page" onclick="location='process_form.php'"
					style="margin-left: 80%;font-family:impact;font-size:90%;width:12%;color:black;"><P>


	<?php
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
		?>
		<p style="text-align:left;margin-left:20%;padding-bottom:5px;font-family:impact;font-size:120%;color:black;">
					Notifications:
		<P></p>
		<?php
		$row_num = $query->num_rows;
		$tmp = 1;
		while($row = $query->fetch_assoc())
		{
			?>
				<p style="text-align:left;border:1px solid black;border-radius: 3px;padding-left:2px;
					width:40%;margin-left:26%;font-family:impact;font-size:100%;color:black;">

			<?php

			echo "Notification #";
			echo $tmp;
			echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
			$sql2 = "Select * from notification where id=".$row['notification_id'];
			$query2= $conn->query($sql2);
			if($query2->num_rows > 0)
			{
				while($row2 = $query2->fetch_assoc())
				{
					echo $row2['month'];
					echo "&nbsp;&nbsp;";
					echo $row2['day'];
					echo ",&nbsp;&nbsp;";
					echo $row2['year'];
					echo "&nbsp;&nbsp;&nbsp;&nbsp;";
					echo $row2['hours'];
					echo ":";
          if(strlen((string)$row2['minute']) == 1) {
            echo "0".$row2['minute']."&nbsp;&nbsp;";
          }
          else {
            echo $row2['minute']."&nbsp;&nbsp;";
          }
          print "<br>";

					echo "Course: ";
					echo strtoupper($row2['course_name']);
					echo "&nbsp;";
					echo $row2['course_id'];
					print "<br>";

					echo "Subject: ";
					echo $row2['subject'];
					print "<br>";
					echo "Message: ";
					echo $row2['message'];
          print "<br>";

				}
			}
			$tmp = $tmp + 1;
		}
	}



	?>

</p>
</body>
</html>
