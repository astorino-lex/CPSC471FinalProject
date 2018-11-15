<html>
  <head>
	<title>Homepage</title>
  <head>

    <body style="background-color:crimson;">
      <p style="text-align:right;padding-top:75px"><image src="logo.png" class="img-responsive" alt="centered image"
          height="100", width="300"></p>
	<?php

		header("Cache-Control: no cache");
		session_cache_limiter("private_no_expire");
		session_start();
		 $name  = $_POST['user_email'];
		 $pass  = $_POST['password'];

		// Trying the database part

		$servername = "localhost";
		$databasename = "cpsc471Project";
		$username = "dylan";
		$password = "password";

		$conn = new mysqli($servername, $username, $password, $databasename);


		if($conn->connect_error)
		{
			die("Connection_failed: " . $conn->connect_error);
		}

//		echo "connected Successfully";
		print "<br>";
		//Check if user exists in database:

		$sql = "SELECT * from end_user";

		$result = $conn->query($sql);

		$founduser = false;

		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc()){
				if($row['user_email'] == $name)
				{
					if($pass == $row['password'])
					{
						print "<br>";
						echo "Logged in as:";
					//	print "<br>";
					//	print "<br>";
					//	echo "You are user: ";
						echo $name;
						print "<br>";
						$founduser = true;
					}
				}
			}

			if($founduser == false)
			{
				echo "Couldn't find your account!";
        //probably need to make this a popup
			}
			else
			{
				// Check if admin or student


				$sql2 = "Select * from admin where user_email = '".$name."'";

				$adminResult = $conn->query($sql2);

				if($adminResult->num_rows >0)
				{
					// is an admin

					$_SESSION['adminname'] = $name;

					?>
					<input type="button" value="Add Course" onclick="location='admin_add_course.php'" />
					<input type="button" value="Select Course" onclick="location='admin_select_course.php'" />
					<input type="button" value="View Notifications" onclick="location='admin_notifications.php'" />
					<?php
				}
				else
				{
					// is a student

          $_SESSION['studentname'] = $name;

					?>
					<input type="button" value="Select Course" onclick="location='student_select_course.php'" />
          <input type="button" value="Favourite Course" onclick="location='student_favourite_course.php'" />
					<input type="button" value="View Notifications" onclick="location='student_notifications.php'" />
          <?php
				}



			}

		}
		else{
			echo "someone didn't make any accounts yet LOL get TROLLLLEDDDD";
		}


		 print "<br>";

		 //compare the strings
		 //if( $name === $good_name && $pass === $good_pass){
		//	echo "That is the correct log-in information";
		 //}else{
			//echo "That is not the correct log-in information.";
		 //}
	  ?>

  </body>
</html>
