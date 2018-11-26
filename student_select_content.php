<?php
	session_start();
	$course_name = $_SESSION['c_name'];
	$course_id = $_SESSION['c_id'];
?>

<html>
	<body>
		<title>
			Select Content
		</title>
	</body>
	
	<h2>
	<?php
	echo strtoupper($course_name." ");
	echo $course_id;
	?>
	</h2>
	
	<body>
	
	<input type="button" value="Assignment Help" onclick="location='student_assignment_help.php'"
			style="margin-left: 40%;font-family:impact;font-size:90%;width:15%;"/><P>
	<input type="button" value="Lab Help" onclick="location='student_lab_help.php'"
			style="margin-left: 40%;font-family:impact;font-size:90%;width:15%;"/><P>
	<input type="button" value="Lecture Notes" onclick="location='student_lecture_notes.php'"
			style="margin-left: 40%;font-family:impact;font-size:90%;width:15%;"/><P>
	<input type="button" value="Practice Problems" onclick="location='student_practice_problems.php'"
			style="margin-left: 40%;font-family:impact;font-size:90%;width:15%;"/><P>



	</body>
</html>