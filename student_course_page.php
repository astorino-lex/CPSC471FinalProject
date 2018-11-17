<html>
<body>

<?php

	session_start();
	$course_name  = $_POST['course_name'];
	$course_id  = $_POST['course_id'];
	$_SESSION['c_name'] = $course_name;
  $_SESSION['c_id'] = $course_id;


	print "<h3>";
	echo strtoupper($course_name." ");
	echo $course_id;
	print"<br>";
	print"<br>";
	print"<br>";
	print "</h3>";

?>

	<input type="button" value="Select Content" onclick="location='student_select_content.php'"
			style="margin-left: 40%;font-family:impact;font-size:90%;width:15%;"/><P>
	<input type="button" value="Upload Content" onclick="location='student_upload_content.php'"
			style="margin-left: 40%;font-family:impact;font-size:90%;width:15%;"/><P>
	<input type="button" value="View Forum" onclick="location='student_forum_page.php'"
			style="margin-left: 40%;font-family:impact;font-size:90%;width:15%;"/><P>



</body>
</html>
