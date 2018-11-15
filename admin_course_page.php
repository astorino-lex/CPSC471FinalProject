<html>
<body>

<?php
	
	session_start();
	$course_name = $_SESSION['course_name'];
	
	echo $course_name;

?>

</body>
</html>