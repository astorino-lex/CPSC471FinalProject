<html>

<?php

	
?>   

<head>
	   <title>Ban Student</title>
  <head>

  <body style="background-color:crimson;">
      <p style="text-align:right;padding-top:75px;padding-right:50px;"><image src="logo.png" class="img-responsive" alt="centered image"
          height="100", width="300"></p>
		  <input type="button" value="Back to Home Page" onclick="history.go(-1);"
					style="margin-left: 80%;font-family:impact;font-size:90%;width:12%;color:black;"><P>
	<?php
	
		session_start();
	
	$sql = "Select * from student;";
	
	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);
	
	$query = $conn->query($sql);
	
	
	if($query)
	{
		while($row = $query->fetch_assoc())
		{
			?>
			<div>
			<?php
			echo "Student email: ".$row['user_email']."&nbsp;&nbsp;&nbsp;";
			
			$sql2 = "select * from BANS where stud_email='".$row['user_email']."';";
			
			$query2 = $conn->query($sql2);
			
			if($query2->num_rows > 0)
			{
				echo "*** USER BANNED ***";
			}
			else
			{
				echo "*** USER ACTIVE ***";
			}
		}
	}
	
	?>
	<P>
    <form action=admin_ban_student_tmp_page.php method=POST
          style="padding-top:80px;text-align:center;font-family:impact;font-size:120%;color:black;float:left;">
  	   Student email: <input type=TEXT name="ban_user_email"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:80%;"
		  required><BR>
  	  <input type=SUBMIT value="Ban Student" style="font-family:impact;font-size:90%;width:80%;">
	   </form>
	   <form action=admin_unban_student_tmp_page.php method=POST
          style="padding-top:80px;text-align:center;font-family:impact;font-size:120%;color:black;float:right;">
  	   Student email: <input type=TEXT name="unban_user_email"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:80%;"
		  required><BR>
  	  <input type=SUBMIT value="Un-Ban Student" style="font-family:impact;font-size:90%;width:80%;"><P>
	   </form>
  </body>

</html>