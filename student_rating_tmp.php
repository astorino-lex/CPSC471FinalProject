<?php
	session_start();
	
	// Initialize components needed to connect to database
	$servername = $_SESSION['servername'];
	$databasename = $_SESSION['databasename'];
	$username = $_SESSION['username_db'];
	$password = $_SESSION['password_db'];

	$conn = new mysqli($servername, $username, $password, $databasename);
	
	// Now check to see which page asking for insertingto the rating table. We need the course title and course id
	if(isSet($_POST['assign_num']))
	{
		// USed distinct simply to ensure only one return value, since we are searching with primary key there should only be one row
		$sql = "Select DISTINCT content_title, content_id FROM assign_help where assign_num=".$_POST['assign_num'].";";
		
		// Now execute query to grab the content id and title for insertion into the assignment.
		$query = $conn->query($sql);
		
		//if successful insert into rating/feedback
		if($query)
		{
			// Only one row, however still use WHILE
			while($row = $query->fetch_assoc())
			{
				$content_title = $row['content_title'];
				$content_id = $row['content_id'];
			}
			
			// Now we have all values needed to rate the submission.
			
			$sql = "INSERT INTO rating_feedback VALUES('".$_SESSION['studentname']."', ".$content_id.", '".$content_title."', ".$_POST['rating_out_of_5'].");";
			echo $sql;
			if($conn->query($sql))
			{
				// Everything worked
				echo "seems to have worked fine";
			}
			else
			{
				echo "no insertion";
				$_SESSION['rating_popup'] = TRUE;
				echo "<script type='text/javascript'>alert('You've already rated this assignment!') window.location = 'student_rating_tmp.php';</script>";
				// delete then add or pop up saying youve already rated this? ***********************************************************
				// Didn't work but since the page it chooses is the same no need to have another action since it simply doesn't affect anything
			}
			
		}
		// We know to go back here since this was the posting page
		header("Location: student_assignment_help.php");
	}
	else if(isSet($_POST['lecture_num']))
	{
		// USed distinct simply to ensure only one return value, since we are searching with primary key there should only be one row
		$sql = "Select DISTINCT content_title, content_id FROM lecture_help where lecture_num=".$_POST['lecture_num'].";";
		
		// Now execute query to grab the content id and title for insertion into the assignment.
		$query = $conn->query($sql);
		
		//if successful insert into rating/feedback
		if($query)
		{
			// Only one row, however still use WHILE
			while($row = $query->fetch_assoc())
			{
				$content_title = $row['content_title'];
				$content_id = $row['content_id'];
			}
			
			// Now we have all values needed to rate the submission.
			
			$sql = "INSERT INTO rating_feedback VALUES('".$_SESSION['studentname']."', ".$content_id.", '".$content_title."', ".$_POST['rating_out_of_5'].");";
			echo $sql;
			if($conn->query($sql))
			{
				// Everything worked
				echo "seems to have worked fine";
			}
			else
			{
				echo "no insertion";
				// delete then add or pop up saying youve already rated this? ***********************************************************
				$_SESSION['rating_popup'] = TRUE;
			}
			
		}
		// We know to go back here since this was the posting page
		header("Location: student_lecture_help.php");
	}
	
	
	// Need a giant check to figure out which type of content help it is in order to link to course content
?>