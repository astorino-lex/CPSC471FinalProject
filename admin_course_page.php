<?php
	session_start();
?>
<html>
	<head>
	   <title>Admin Course Page</title>
  </head>

  <body style="background-color:crimson;">
      <p style="text-align:right;padding-top:75px;padding-right:50px;"><image src="logo.png" class="img-responsive" alt="centered image"
          height="100", width="300"></p>
			<input type="button" value="Back to Select A Course Page" onclick="location='admin_select_course.php'"
							style="margin-left: 80%;font-family:impact;font-size:90%;width:15%;color:black;"><P>

			<style>
					table {
							margin-left:-10%;
					    font-family:impact;
							font-size:90%;
					    border-collapse: collapse;
					    width: 100%;
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

<?php
	$course_name  = $_SESSION['c_name'];
	$course_id  =   $_SESSION['c_id'];

	$servername = $_SESSION['servername'];
	$databasename = $_SESSION['databasename'];
	$username = $_SESSION['username_db'];
	$password = $_SESSION['password_db'];

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

	$sql = "Select * from course_content where course_name = '".$course_name."' AND course_id =".$course_id;

	$query = $conn->query($sql);
	if($query->num_rows > 0)
	{
	?>
	<table>
	  <tr style = "background-color: DarkRed">
	    <th>ID</th>
	    <th>Title</th>
			<th>Format</th>
			<th>Course ID</th>
			<th>Course Name</th>
	    <th>Report Status</th>
			<th>Approval Status</th>
	  </tr>
	  <tr>
	<?php

	
		while($row = $query->fetch_assoc())
		{
			?>
			<tr>
				<th>  <?php echo $row['id']; ?> </th>
				<th>	<?php echo $row['title']; ?> </th>
				<th>	<?php echo $row['format']; ?> </th>
				<th>	<?php echo $row['course_id']; ?> </th>
				<th>	<?php echo $row['course_name']; ?> </th>
				<th>	<?php
				$zero = 0;
				$one = 1;
				if ($row['report_status'] == $zero) {
					echo "Not reported";
				}
				elseif($row['report_status'] == $one) {
					echo "Reported";
				}
				?> </th>
				<th>	<?php
				if ($row['approval_status'] == $zero) {
					echo "Unapproved";
				}
				elseif($row['approval_status'] == $one) {
					echo "Approved";
				}
		}?>
		</th>
		</tr>
		</table>
		<?php
	}
	else
	{
		?><p style="text-align:left;margin-left:15%;padding-bottom:5px;font-family:impact;font-size:120%;color:black;"><?php
		echo "No content has been uploaded yet!</p>";
	}

?>
	
	
	<P></p>
	<div style="text-align:center;font-family:impact;font-size:120%;color:black;">
		<u>
		Approve Content Upload
		</u>
	</div>
	<form action=admin_approve_content.php method=POST
          style="text-align:center;font-family:impact;font-size:100%;color:black;">
  	   Content ID: <input type=TEXT name="content_id"
          style="display:inline-block;vertical-align:left;border: 1px solid black;padding: 3px 3px;width:15%;"><BR>
  	  <input type=SUBMIT value="Approve Content" style="font-family:impact;font-size:90%;width:12%;"><P>
	 </form>

	<div style="padding-top:20;text-align:center;font-family:impact;font-size:120%;color:black;">
		<u>
			Remove Content
		</u>
	</div>
	   <form action=admin_remove_content.php method=POST
          style="text-align:center;font-family:impact;font-size:100%;color:black;">
  	   Content ID: <input type=TEXT name="content_id"
          style="display:inline-block;vertical-align:left;border: 1px solid black;padding: 3px 3px;width:15%;"><BR>
  	  <input type=SUBMIT value="Remove Content" style="font-family:impact;font-size:90%;width:12%;"><P>
	   </form>

</body>

<?php
		if(isSet($_SESSION['approved_already'])){
		if ($_SESSION['approved_already'] == TRUE){
			echo "<script type='text/javascript'>alert('That content is already approved!')
					window.location = 'admin_course_page.php';</script>";
					$_SESSION['approved_already'] = FALSE;
		}
		}
		if(isSet($_SESSION['$invalidID'])){
		if ($_SESSION['$invalidID'] == TRUE){
			echo "<script type='text/javascript'>alert('That is not a valid content ID!')
					window.location = 'admin_course_page.php';</script>";
					$_SESSION['$invalidID'] = FALSE;
		}
		}
?>
</html>
