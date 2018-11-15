<html>
	<head>
		<title>
			Notifications
		</title>
	</head>
	
	<?php
	session_start();
	$admin_name = $_SESSION['adminname'];
	$sql = "Select * from admin_notifications where email = '".$admin_name."'";
	
	
	
	$servername = "localhost";
		$databasename = "cpsc471Project";
		$username = "dylan";
		$password = "password";
		
		$conn = new mysqli($servername, $username, $password, $databasename);
		
	$query = $conn->query($sql);
	
	if($query->num_rows > 0)
	{
		echo "Notifications:";
		print "<br>";
		$row_num = $query->num_rows;
		while($row = $query->fetch_assoc())
		{
			$tmp = $row_num - $query->num_rows + 1;
			echo "Notification #".$tmp;
			print "<br>";
			$sql2 = "Select * from notification where id=".$row['notification_id'];
			$query2= $conn->query($sql2);
			if($query2->num_rows > 0)
			{
				while($row2 = $query2->fetch_assoc())
				{
					echo "Subject: ";
					echo $row2['subject'];
					print "<br>";
					echo "Message: ";
					echo $row2['message'];
				}
			}
		}
	}
	
	
	?>
	
	
</html>