<html>
	<head>
		<title>
			Notifications
		</title>
	</head>
	
	<?php
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
		while($row = $query->fetch_assoc())
		{
			echo "Subject: ";
			echo $row['subject'];
			print "<br>";
			echo "Message: ";
			echo $row['message'];
		}
	}
	
	
	?>
	
	
</html>