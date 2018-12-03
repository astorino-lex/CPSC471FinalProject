<?php
	session_start();
	$course_name  = $_SESSION['c_name'];
	$course_id  = $_SESSION['c_id'];
?>

<html>
		<head>
			<title>
				Lab Help
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



		$sql = "Select l.lab_num, l.content_title, c.user_email FROM lab_help as l, course_content as c WHERE l.content_id=c.id";
		$sql = $sql." AND l.content_title = c.title AND c.course_id=".$course_id." AND c.course_name='".$course_name."' AND approval_status = 1;";

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
					<th>Lab ID</th>
					<th>Title</th>
					<th>Submitted By</th>
				</tr>
				</thead>
			<tbody>
			<?php
			while($row = $query->fetch_assoc())
			{
				?>
				<tr text-align="center">
					<td><?php echo $row['lab_num'] ?></td>
					<td><?php echo $row['content_title'] ?></td>
					<td><?php echo $row['user_email'] ?></td>
				</tr>

				<?php
			}
			?>
			 </tbody>
			</table>
			</p>

			<div style="text-align:center;font-family:impact;font-size:120%;color:black;">
				<u>
				View Lab
				</u>
			</div>
			<form action=student_view_lab.php method=POST
							style="text-align:center;text-align:center;font-family:impact;font-size:100%;color:black;">
					 Lab ID: <input type=TEXT name="lab_num"
							style="vertical-align:left;border: 1px solid black;padding: 3px 3px;width:8%;"
							required><BR>
					<input type=SUBMIT value="View Lab" style="font-family:impact;font-size:90%;width:8%;"><P>
			 </form>

			<div style="text-align:center;font-family:impact;font-size:120%;color:black;">
				<u>
					Rate Lab
				</u>
			</div>
				 <form action=something method=POST
							style="text-align:center;font-family:impact;font-size:100%;color:black;">
						 	Lab ID: <input type=TEXT name="lab_num"
								style="display:inline-block;vertical-align:left;border: 1px solid black;padding: 3px 3px;width:8%;"
								required><BR>
							Rating out of 5: 	<input type=TEXT name=something
								style="display:inline-block;vertical-align:left;border: 1px solid black;padding: 3px 3px;width:8%;"
								required><BR>
					<input type=SUBMIT value="Rate Lab" style="font-family:impact;font-size:90%;width:8%;"><P>
				 </form>
				 <div style="padding-top:20;text-align:center;font-family:impact;font-size:120%;color:black;">
					<u>
						Report Lab
					</u>
				</div>
					 <form action=something method=POST
								style="text-align:center;font-family:impact;font-size:100%;color:black;">
								Lab ID: <input type=TEXT name="lab_num"
									style="display:inline-block;vertical-align:left;border: 1px solid black;padding: 3px 3px;width:8%;"
									required><BR>
								Reason: 	<input type=TEXT name=something
									style="display:inline-block;vertical-align:left;border: 1px solid black;padding: 3px 3px;width:15%;"
									required><BR>
						<input type=SUBMIT value="Report Lab" style="font-family:impact;font-size:90%;width:8%;"><P>
					 </form>
			<?php
		}
		else
		{
			echo "There has been no Lab help uploaded yet!";
		}

		?>
</html>
