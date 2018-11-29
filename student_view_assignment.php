<?php
	session_start();
	$assign_num = $_POST['assign_num'];
?>
<html>
	<h3> Need a BACK button </h3>
	<embed src="Assigment2.pdf" width="500" height="375" type='pdf'>
	<?php
	
	$sql = "Select title from assign_help where assign_num=".$assign_num.";";

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);
	
	if($query)
	{
		$row = $query->fetch_assoc();
		$title = $row['title'];
		$title = "data/cpsc471/assignment/Alexa_old.jpg";
	}
	
	?>
	
	
	<?php
  header("Content-type: application/pdf;");
header("Content-Disposition: inline; filename=Assigment2.pdf");
@readfile('data/cpsc471/assignment/Assigment2.pdf');
?>
	
</html>