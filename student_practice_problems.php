<?php
	session_start();
	$course_name  = $_SESSION['c_name'];
	$course_id  = $_SESSION['c_id'];
?>

<html>
		<head>
			<title>
				Practice Problems
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


		$sql = "select p.content_id, p.practice_id, p.content_title, c.user_email, truncate(sum(r.rating_out_of_5)/count(r.content_id), 2) as rating FROM practice_problems as p, course_content as c";
		$sql = $sql." LEFT JOIN rating_feedback as r ON r.content_id = c.id AND r.content_title = c.title";
		$sql = $sql." Where p.content_id=c.id AND p.content_title=c.title AND c.course_id=".$course_id." AND c.course_name='".$course_name."' AND c.approval_status=1";
		$sql = $sql." GROUP BY practice_num ORDER BY rating DESC;";
		
		//$sql = "Select p.content_id, p.practice_id, p.content_title, c.user_email FROM practice_problems as p, course_content as c WHERE p.content_id=c.id";
		//$sql = $sql." AND p.content_title = c.title AND c.course_id=".$course_id." AND c.course_name='".$course_name."' AND approval_status = 1;";

		$query = $conn->query($sql);

		if($query)
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
					<th>Practice Problem ID</th>
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
					<td><?php echo $row['practice_id'] ?></td>
					<td><?php echo $row['content_title'] ?></td>
					<td><?php echo $row['user_email'] ?></td>
					<?php
					// Check is not rated
					if(!isSet($row['rating']))
						$rating = "Not Rated Yet";
					else
						$rating = $row['rating']."/5";
					?><td><?php echo $rating ?></td><?php
					/*
					$content_id = $row['content_id'];
					$sql1 = "Select * from rating_feedback where content_id=".$content_id."";
					$query2 = $conn->query($sql1);
					if($query2->num_rows > 0)
					{
						$row2 = $query2->fetch_assoc();
						// To get the total rating out of 5 another query must be executed
						
						$sql3 = "Select truncate(sum(rating_out_of_5)/count(*), 2) from rating_feedback where content_id=".$content_id." AND content_title='".$row['content_title']."';";
						$query3 = $conn->query($sql3);
						if($query3)
						{
							$row3 = $query3->fetch_assoc();
							$rating = $row3['truncate(sum(rating_out_of_5)/count(*), 2)'];
							$rating = $rating."/5";
						}
					 
					}
					else{
						$rating = "Not Rated Yet";
					}
					?><td><?php echo $rating ?></td><?php
					*/
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
					View Practice Problems
					</u>
				</div>
				<form action=student_view_practice_problem.php method=POST
								style="text-align:center;text-align:center;font-family:impact;font-size:100%;color:black;">
						 Problem ID: <input type=TEXT name="practice_id"
								style="vertical-align:left;border: 1px solid black;padding: 3px 3px;width:8%;"
								required><BR>
						<input type=SUBMIT value="View Problem" style="font-family:impact;font-size:90%;width:12%;"><P>
				 </form>

				<div style="text-align:center;font-family:impact;font-size:120%;color:black;">
					<u>
						Rate Practice Problems
					</u>
				</div>
					 <form action=student_problem_rating.php method=POST
								style="text-align:center;font-family:impact;font-size:100%;color:black;">
								Problem ID: <input type=TEXT name="practice_id"
									style="display:inline-block;vertical-align:left;border: 1px solid black;padding: 3px 3px;width:8%;"
									required><BR>
								Rating out of 5: 	<input type=TEXT name="rating_out_of_5"
									style="display:inline-block;vertical-align:left;border: 1px solid black;padding: 3px 3px;width:8%;"
									required><BR>
						<input type=SUBMIT value="Rate Problem" style="font-family:impact;font-size:90%;width:12%;"><P>
					 </form>
					 <div style="padding-top:20;text-align:center;font-family:impact;font-size:120%;color:black;">
						<u>
							Report Practice Problems
						</u>
					</div>
						 <form action=student_problem_report.php method=POST
									style="text-align:center;font-family:impact;font-size:100%;color:black;">
									Problem ID: <input type=TEXT name="practice_id"
										style="display:inline-block;vertical-align:left;border: 1px solid black;padding: 3px 3px;width:8%;"
										required><BR>
							<input type=SUBMIT value="Report Problem" style="font-family:impact;font-size:90%;width:12%;"><P>
						 </form>
			<?php
		}
		else
		{
			?>
			<html>
			<p style = "text-align:center;font-family:impact;font-size:120%;color:black;">
				There has been no Practice Problems uploaded yet!
			</p>
			</html>
			<?php
		}

		?>
		<?php
			if($_SESSION['practice_invalid'] == TRUE)
			{
				$_SESSION['practice_invalid'] = FALSE;
				echo "<script type='text/javascript'>alert('That practice ID does not exist, please try again!')
				window.location = 'student_practice_problems.php';</script>";
			}
		 ?>
</html>
