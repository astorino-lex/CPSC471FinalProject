<html>

<?php
	session_start();
	$student_email = $_SESSION['studentname'];

	$question = $_POST['question'];

//HELP W THE Q ID!!!!!!!!!!!!!!!!!
	$sql = "INSERT INTO QUESTION Values(".$_SESSION['c_id'].".$_SESSION['c_name']."'.$student_email."');";

	$servername = "127.0.0.1";
	$databasename = "cpsc471project";
	$username = "dylan";
	$password = "password";

	$conn = new mysqli($servername, $username, $password, $databasename);

	$query = $conn->query($sql);

	header("Location:admin_ban_student_page.php");

?>

</html>
