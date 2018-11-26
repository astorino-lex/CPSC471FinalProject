<?php
	session_start();
 ?>

<html>
<head>
	 <title>Student Course Page</title>
</head>
<body style="background-color:crimson;">
		<p style="text-align:right;padding-top:75px;padding-right:50px;"><image src="logo.png" class="img-responsive" alt="centered image"
				height="100", width="300"></p>
		<input type="button" value="Back to Select A Course Page" onclick="history.go(-1);"
						style="margin-left: 80%;font-family:impact;font-size:90%;width:15%;color:black;"><P>

<?php
	$course_name = $_SESSION['c_name'];
  $course_id = $_SESSION['c_id'];

	$servername = "127.0.0.1";
	$databasename = "cpsc471Project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$sql = "Select title from course where id=".$course_id." AND course_name= '".$course_name."'";

	$query = $conn->query($sql);

	if($query->num_rows >0)
	{
		?>
		<p style="text-align:left;margin-left:15%;padding-bottom:5px;font-family:impact;font-size:120%;color:black;">
		<?php
		echo strtoupper($course_name);
		echo "&nbsp;";
		echo $course_id."&nbsp;&nbsp;";
		while($row = $query->fetch_assoc())
		{
			echo $row['title'];
		}
	}
?>
</p>

	<input type="button" value="Select Content" onclick="location='student_select_content.php'"
			style="margin-left: 40%;font-family:impact;font-size:90%;width:15%;"/><P>
	<input type="button" value="Upload Content" onclick="location='student_upload_content.php'"
			style="margin-left: 40%;font-family:impact;font-size:90%;width:15%;"/><P>
	<input type="button" value="View Forum" onclick="location='student_forum_page.php'"
			style="margin-left: 40%;font-family:impact;font-size:90%;width:15%;"/><P>



</body>
</html>
