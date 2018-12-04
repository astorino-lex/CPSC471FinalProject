<?php
	session_start();
	$course_name  = $_SESSION['c_name'];
	$course_id  = $_SESSION['c_id'];
?>

<html>
		<head>
			<title>
				Assignment Help
			</title>
		</head>

		<body style="background-color:crimson;">
			<p style="text-align:right;padding-top:75px;padding-right:50px;"><image src="logo.png" class="img-responsive" alt="centered image"
						height="100", width="300"></p>
				<input type="button" value="Back to Content Page" onclick="location='student_select_content.php'"
						style="margin-left: 80%;font-family:impact;font-size:90%;width:13%;color:black;"><P>
		</body>

		<?php

		$servername = "127.0.0.1";
		$databasename = "cpsc471Project";
		$username = "dylan";
		$password = "password";

		$conn = new mysqli($servername, $username, $password, $databasename);



		$sql = "Select a.content_id, a.assign_num, a.content_title, c.user_email FROM assign_help as a, course_content as c WHERE a.content_id=c.id";
		$sql = $sql." AND a.content_title = c.title AND c.course_id=".$course_id." AND c.course_name='".$course_name."' AND approval_status = 1;";

		$query = $conn->query($sql);

		if($query->num_rows > 0)
		{
			?>
			<style>
					table {
							margin-left:10%;
					    font-family:impact;
							font-size:90%;
					    border-collapse: collapse;
					    width: 80%;
					}

					td, th {
					    border: 1px solid black;
					    text-align: left;
					    padding: 8px;
					}

					tr:nth-child(even) {
					    background-color: #B22222;
					}
				</style>

			<table>



				<thead>
				<tr style = "background-color: DarkRed">
					<th>Assignment ID</th>
					<th>Title</th>
					<th>Submitted By</th>
					<th>Rating</th>
				</tr>
				</thead>
			<tbody>
			<?php
			while($row = $query->fetch_assoc())
			{
				?>
				<tr text-align="center">
					<td><?php echo $row['assign_num'] ?></td>
					<td><?php echo $row['content_title'] ?></td>
					<td><?php echo $row['user_email'] ?></td>
					<?php
					$content_id = $row['content_id'];
					$sql1 = "Select * from rating_feedback where content_id=".$content_id."";
					$query2 = $conn->query($sql1);
					if($query2->num_rows > 0)
					{
						$row2 = $query2->fetch_assoc();
						$rating = $row2['rating_out_of_5'];
					 ?><td><?php echo $rating."/5" ?></td><?php
					}
				 ?>

				</tr>

				<?php
			}
			?>
			 </tbody>
			</table>
			</p>

				<div style="text-align:center;font-family:impact;font-size:120%;color:black;">
					<u>
					View Assignment
					</u>
				</div>
				<form action=student_view_assignment.php method=POST
			          style="text-align:center;text-align:center;font-family:impact;font-size:100%;color:black;">
			  	   Assignment ID: <input type=TEXT name="assign_num"
			          style="vertical-align:left;border: 1px solid black;padding: 3px 3px;width:8%;"
								required><BR>
			  	  <input type=SUBMIT value="View Assignment" style="font-family:impact;font-size:90%;width:12%;"><P>
				 </form>

				<div style="text-align:center;font-family:impact;font-size:120%;color:black;">
					<u>
						Rate Assignment
					</u>
				</div>
				   <form action=student_rating_tmp.php method=POST
			          style="text-align:center;font-family:impact;font-size:100%;color:black;">
								Assignment ID: <input type=TEXT name="assign_num"
	 			          style="display:inline-block;vertical-align:left;border: 1px solid black;padding: 3px 3px;width:8%;"
	 								required><BR>
								Rating out of 5: 	<input type=TEXT name="rating_out_of_5"
	 			          style="display:inline-block;vertical-align:left;border: 1px solid black;padding: 3px 3px;width:8%;"
	 								required><BR>
			  	  <input type=SUBMIT value="Rate Assignment" style="font-family:impact;font-size:90%;width:12%;"><P>
				   </form>
					 <div style="padding-top:20;text-align:center;font-family:impact;font-size:120%;color:black;">
	 					<u>
	 						Report Assignment
	 					</u>
	 				</div>
	 				   <form action=student_assignment_report.php method=POST
	 			          style="text-align:center;font-family:impact;font-size:100%;color:black;">
	 								Assignment ID: <input type=TEXT name="assign_num"
	 	 			          style="display:inline-block;vertical-align:left;border: 1px solid black;padding: 3px 3px;width:8%;"
	 	 								required><BR>
	 			  	  <input type=SUBMIT value="Report Assignment" style="font-family:impact;font-size:90%;width:12%;"><P>
	 				   </form>
			<?php
		}
		else
		{
			echo "There has been no Assignment help uploaded yet!";
		}

		?>

		<?php
			if($_SESSION['assignment_invalid'] == TRUE)
	  	{
	      $_SESSION['assignment_invalid'] = FALSE;
	      echo "<script type='text/javascript'>alert('That assignment ID does not exist, please try again!')
				window.location = 'student_assignment_help.php';</script>";
	  	}
		 ?>


</html>
