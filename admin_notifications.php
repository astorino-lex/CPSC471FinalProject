<?php
		session_start();
	?>

<html>
	<head>
		<title>
			Notifications
		</title>
	</head>

	<body style="background-color:crimson;">
		<p style="text-align:right;padding-top:75px;padding-right:50px;"><image src="logo.png" class="img-responsive" alt="centered image"
					height="100", width="300"></p>
			<input type="button" value="Back to Home Page" onclick="history.go(-1);"
					style="margin-left: 80%;font-family:impact;font-size:90%;width:12%;color:black;"><P>

	<?php
	$admin_name = $_SESSION['adminname'];
	$sql = "Select * from admin_notifications where email = '".$admin_name."'";



	$servername = "127.0.0.1";
		$databasename = "cpsc471Project";
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
				<p style="text-align:left;border:2px solid black;border-radius: 5px;padding-left:20px;width: 40%;
					margin-left:26%;font-family:impact;font-size:120%;color:black;">
							Notification #:
			<?php
			echo $tmp;
			print "<br>";
			?>
				</p>
			<?php
			$sql2 = "Select * from notification where id=".$row['notification_id'];
			$query2= $conn->query($sql2);
			if($query2->num_rows > 0)
			{
				while($row2 = $query2->fetch_assoc())
				{
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

				}
			}
			$tmp = $tmp + 1;
		}
	}



	?>
</body>
</html>
