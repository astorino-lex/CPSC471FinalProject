<html>

<?php
	
	session_start();
	
	$admin_name = $_SESSION['admin_name'];
	echo $admin_name;
	
?>

</html>