<?php
session_start();
?>
<html>
<head>
	   <title>Ban Student</title>
  <head>

  <body style="background-color:crimson;">
      <p style="text-align:right;padding-top:75px;padding-right:50px;"><image src="logo.png" class="img-responsive" alt="centered image"
          height="100", width="300"></p>
		  <input type="button" value="Back to Home Page" onclick="location='process_form.php'"
					style="margin-left: 80%;font-family:impact;font-size:90%;width:12%;color:black;"><P>
	<?php

	$sql = "Select * from student;";

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
					Students enrolled in courses you manage:
		<P></p>
		<?php
		while($row = $query->fetch_assoc())
		{
			?>
			<p style="text-align:left;border:1px solid black;border-radius: 3px;padding-left:2px;
				width:40%;margin-left:26%;font-family:impact;font-size:100%;color:black;">
			<?php
			echo "Student email:&nbsp;&nbsp;".$row['user_email']."&nbsp;&nbsp;&nbsp;";

			$sql2 = "select * from BANS where stud_email='".$row['user_email']."';";

			$query2 = $conn->query($sql2);

			if($query2->num_rows > 0)
			{
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* USER BANNED *";
			}
			else
			{
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* USER ACTIVE *";
			}
		}
	}

	?>
	<P>
	</p>
    <form action=admin_ban_student_tmp_page.php method=POST
          style="margin-left:25%;padding-top:20px;font-family:impact;font-size:120%;color:black;float:left;">
  	   Student email: <input type=TEXT name="ban_user_email"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:80%;"
		  required><BR>
  	  <input type=SUBMIT value="Ban Student" style="font-family:impact;font-size:90%;width:80%;">
	   </form>
	   <form action=admin_unban_student_tmp_page.php method=POST
          style="margin-right:25%;padding-top:20px;font-family:impact;font-size:120%;color:black;float:right;">
  	   Student email: <input type=TEXT name="unban_user_email"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:80%;"
		  required><BR>
  	  <input type=SUBMIT value="Un-Ban Student" style="font-family:impact;font-size:90%;width:80%;"><P>
	   </form>
  </body>

	<?php
			if ($_SESSION['unvalid_email'] == TRUE){
				echo "<script type='text/javascript'>alert('The user email entered does not exist!')
						window.location = 'admin_ban_student_page.php';</script>";
						$_SESSION['unvalid_email'] = FALSE;
			}
			if ($_SESSION['already_banned'] == TRUE){
				echo "<script type='text/javascript'>alert('The user is already banned!')
						window.location = 'admin_ban_student_page.php';</script>";
						$_SESSION['already_banned'] = FALSE;
			}
			if ($_SESSION['not_banned'] == TRUE){
				echo "<script type='text/javascript'>alert('The user is active banned already!')
						window.location = 'admin_ban_student_page.php';</script>";
						$_SESSION['not_banned'] = FALSE;
			}
	?>

</html>
