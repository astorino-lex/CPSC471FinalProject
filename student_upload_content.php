<?php
session_start();
?>

<html>
  <head>
	   <title>KickstartU Upload Content</title>
  <head>

  <body style="background-color:crimson;">
    <p style="text-align:right;padding-top:75px;padding-right:50px;"><image src="logo.png" class="img-responsive" alt="centered image"
        height="100", width="300"></p>
        <input type="button" value="Back To Course Page" onclick="location='student_course_page.php'"
              style="margin-left: 80%;font-family:impact;font-size:90%;width:15%;color:black;"><P>

<?php
$servername = "127.0.0.1";
$databasename = "cpsc471Project";
$username = "dylan";
$password = "password";

$conn = new mysqli($servername, $username, $password, $databasename);

$course_name = $_SESSION['c_name'];
$course_id = $_SESSION['c_id'];
$studentname = $_SESSION['studentname'];

date_default_timezone_set("Canada/Mountain");
$day = date("d");
$year = date("Y");
$month = date("m");

if ($month == 1){
  $month = "January";
}
else if ($month == 2){
  $month = "February";
}
else if ($month == 3){
  $month = "March";
}
else if ($month == 4){
  $month = "April";
}
else if ($month == 5){
  $month = "May";
}
else if ($month == 6){
  $month = "June";
}
else if ($month == 7){
  $month = "July";
}
else if ($month == 8){
  $month = "August";
}
else if ($month == 9){
  $month = "September";
}
else if ($month == 10){
  $month = "October";
}
else if ($month == 11){
  $month = "November";
}
else{
  $month = "December";
}

$hour = date("h");
$minute = date("i");

$sql2 = "Insert into notification (message, subject, month, day, year, hours, minute, course_name, course_id) values('approve content upload', 'approval pending', '".$month."', ".$day.", ".$year.", ".$hour.", ".$minute.", '".$course_name."', ".$course_id.");";
$query2 = $conn->query($sql2);

$sql3 = "Select * from notification WHERE course_name = '".$course_name."' AND course_id = ".$course_id." AND subject = 'approval pending' AND month = '".$month."' AND day = ".$day." AND year = ".$year." AND hours = ".$hour." AND minute = ".$minute;
$query3 = $conn->query($sql3);
$row = $query3->fetch_assoc();
// This does not get the right id if they are submitted at the same time, go two lines down for proper grab of the id
$notify_id = $row['id'];
// This grabs teh last inserted ID. aka the notification id
$sql_getID = "SELECT last_insert_id();";
$query_getID = $conn->query($sql_getID);
$row_id = $query_getID->fetch_assoc();
$notify_id = $row_id['last_insert_id()'];

$sql4 = "Select * from course WHERE course_name = '".$course_name."' AND id = ".$course_id;
$query4 = $conn->query($sql4);
while($row4 = $query4->fetch_assoc()){
  $sql5 = "Insert into admin_notifications (notification_id, email) values(".$notify_id.", '".$row4['user_email']."');";
  $query5 = $conn->query($sql5);

  $sql6 = "Insert into recieves (notification_id, user_email) values(".$notify_id.", '".$row4['user_email']."');";
  $query6 = $conn->query($sql6);
}


if(isset($_FILES['lecture'])){
      $errors= "";
      $file_name = $_FILES['lecture']['name'];
      $file_size =$_FILES['lecture']['size'];
      $file_tmp =$_FILES['lecture']['tmp_name'];
      $file_type=$_FILES['lecture']['type'];
     // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$file_ext=explode('.',$_FILES['lecture']['name']);
		$file_ext = end($file_ext);
		$file_ext = strtolower($file_ext);
      $extensions= array("pdf");

      if(in_array($file_ext,$extensions)== false){
        $errors='Extension not allowed, KickstartU only accepts .pdf!';
        echo "<script type='text/javascript'>alert('Extension not allowed, KickstartU only accepts .pdf!')
        window.location = 'student_upload_content.php';</script>";
      }

      if($file_size > 2097152){
        $errors='File size must be exactly 2 MB';
        echo "<script type='text/javascript'>alert('File size must be exactly 2 MB')
        window.location = 'student_upload_content.php';</script>";
      }

      if(strlen($errors)==0){
		  $tmpdir = "data/".$course_name.$course_id."/lectures/";
		  if(!is_dir($tmpdir))
			mkdir($tmpdir, 0755, true);
		move_uploaded_file($file_tmp,$tmpdir.$file_name);

		$sql = "INSERT INTO course_content (title, format, user_email,  course_id, course_name) ";
		$sql = $sql."VALUES('".$file_name."', '".$file_ext."', '".$studentname."', ".$course_id.", '".$course_name."');";

		//$sql2 = "SELECT LAST_INSERT_ID() FROM course_content;";

		//$query2 = $conn->query($sql2);
		$content_id = -1;
		if($conn->query($sql) === true)
		{
			$content_id = $conn->insert_id;
		}
		// insert into appropriate other table for database.

		$sql3 = "INSERT INTO lecture_help (content_id, content_title) VALUES (".$content_id.", '".$file_name."');";

		$query3 = $conn ->query($sql3);

      }
   }
   if(isset($_FILES['lab'])){
      $errors= "";
      $file_name = $_FILES['lab']['name'];
      $file_size =$_FILES['lab']['size'];
      $file_tmp =$_FILES['lab']['tmp_name'];
      $file_type=$_FILES['lab']['type'];
     // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$file_ext=explode('.',$_FILES['lab']['name']);
		$file_ext = end($file_ext);
		$file_ext = strtolower($file_ext);
      $extensions= array("pdf");

      if(in_array($file_ext,$extensions)== false){
        $errors='Extension not allowed, KickstartU only accepts .pdf!';
        echo "<script type='text/javascript'>alert('Extension not allowed, KickstartU only accepts .pdf!')
        window.location = 'student_upload_content.php';</script>";
      }

      if($file_size > 2097152){
        $errors='File size must be exactly 2 MB';
        echo "<script type='text/javascript'>alert('File size must be exactly 2 MB')
        window.location = 'student_upload_content.php';</script>";
      }

      if(strlen($errors)==0){
		  $tmpdir = "data/".$course_name.$course_id."/lab/";
		  if(!is_dir($tmpdir))
			mkdir($tmpdir, 0755, true);
		move_uploaded_file($file_tmp,$tmpdir.$file_name);

		$sql = "INSERT INTO course_content (title, format, user_email,  course_id, course_name) ";
		$sql = $sql."VALUES('".$file_name."', '".$file_ext."', '".$studentname."', ".$course_id.", '".$course_name."');";


		// $servername = "127.0.0.1";
		// $databasename = "cpsc471Project";
		// $username = "dylan";
		// $password = "password";

		//$conn = new mysqli($servername, $username, $password, $databasename);



		//$sql2 = "SELECT LAST_INSERT_ID() FROM course_content;";

		//$query2 = $conn->query($sql2);
		$content_id = -1;
		if($conn->query($sql) === true)
		{
			$content_id = $conn->insert_id;
		}
		// insert into appropriate other table for database.

		$sql3 = "INSERT INTO lab_help (content_id, content_title) VALUES (".$content_id.", '".$file_name."');";

		$query3 = $conn ->query($sql3);

      }
   }
   if(isset($_FILES['assignment'])){
      $errors = "";
      $file_name = $_FILES['assignment']['name'];
      $file_size =$_FILES['assignment']['size'];
      $file_tmp =$_FILES['assignment']['tmp_name'];
      $file_type=$_FILES['assignment']['type'];
     // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$file_ext=explode('.',$_FILES['assignment']['name']);
		$file_ext = end($file_ext);
		$file_ext = strtolower($file_ext);
      $extensions= array("pdf");

      if(in_array($file_ext,$extensions)== false){
         $errors='Extension not allowed, KickstartU only accepts .pdf!';
          echo "<script type='text/javascript'>alert('Extension not allowed, KickstartU only accepts .pdf!')
          window.location = 'student_upload_content.php';</script>";
      }
      if($file_size > 2097152){
         $errors='File size must be exactly 2 MB';
         echo "<script type='text/javascript'>alert('File size must be exactly 2 MB')
         window.location = 'student_upload_content.php';</script>";
      }

      if(strlen($errors)==0){
		  $tmpdir = "data/".$course_name.$course_id."/assignment/";
		  if(!is_dir($tmpdir))
			mkdir($tmpdir, 0755, true);
		move_uploaded_file($file_tmp,$tmpdir.$file_name);

		$sql = "INSERT INTO course_content (title, format, user_email,  course_id, course_name) ";
		$sql = $sql."VALUES('".$file_name."', '".$file_ext."', '".$studentname."', ".$course_id.", '".$course_name."');";

    //
		// $servername = "127.0.0.1";
		// $databasename = "cpsc471Project";
		// $username = "dylan";
		// $password = "password";
    //
		// $conn = new mysqli($servername, $username, $password, $databasename);



		//$sql2 = "SELECT LAST_INSERT_ID() FROM course_content;";

		//$query2 = $conn->query($sql2);
		$content_id = -1;
		if($conn->query($sql) === true)
		{
			$content_id = $conn->insert_id;
		}
		// insert into appropriate other table for database.

		$sql3 = "INSERT INTO assign_help (content_id, content_title) VALUES (".$content_id.", '".$file_name."');";

		$query3 = $conn ->query($sql3);

     }
   }
   if(isset($_FILES['practiceproblems'])){

      $errors= array();
      $file_name = $_FILES['practiceproblems']['name'];
      $file_size =$_FILES['practiceproblems']['size'];
      $file_tmp =$_FILES['practiceproblems']['tmp_name'];
      $file_type=$_FILES['practiceproblems']['type'];
     // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$file_ext=explode('.',$_FILES['practiceproblems']['name']);
		$file_ext = end($file_ext);
		$file_ext = strtolower($file_ext);
      $extensions= array("pdf");

      if(in_array($file_ext,$extensions)== false){
         $errors[]="extension not allowed, KickstartU only accepts .pdf!";
         echo "<script type='text/javascript'>alert('That lecture ID does not exist, please try again!')
         window.location = 'student_lecture_notes.php';</script>";
      }

      if($file_size > 2097152){
         $errors[]='File size must be exactly 2 MB';
      }

      if(empty($errors)==true){
		  $tmpdir = "data/".$course_name.$course_id."/practiceproblems/";
		  if(!is_dir($tmpdir))
			mkdir($tmpdir, 0755, true);
		move_uploaded_file($file_tmp,$tmpdir.$file_name);
		$sql = "INSERT INTO course_content (title, format, user_email,  course_id, course_name) ";
		$sql = $sql."VALUES('".$file_name."', '".$file_ext."', '".$studentname."', ".$course_id.", '".$course_name."');";

    //
		// $servername = "127.0.0.1";
		// $databasename = "cpsc471Project";
		// $username = "dylan";
		// $password = "password";
    //
		// $conn = new mysqli($servername, $username, $password, $databasename);



		//$sql2 = "SELECT LAST_INSERT_ID() FROM course_content;";

		//$query2 = $conn->query($sql2);
		$content_id = -1;
		if($conn->query($sql) === true)
		{
			$content_id = $conn->insert_id;
		}
		// insert into appropriate other table for database.

		$sql3 = "INSERT INTO practice_problems (content_id, content_title) VALUES (".$content_id.", '".$file_name."');";

		$query3 = $conn ->query($sql3);

      }
   }
?>
   <body>
      <form action="" method="POST" enctype="multipart/form-data">
        <p style="text-align:left;margin-left:2%;font-family:impact;font-size:120%;color:black;">
          Assignment help
        </p>
         <input type="file" name="assignment" style="margin-left:2%;font-family:impact;"/>
         <input type="submit" style="width:8%;"/>
      </form>
        <p style="text-align:left;margin-left:2%;font-family:impact;font-size:120%;color:black;">
	         Lab Help
        </p>
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="lab"  style="margin-left:2%;font-family:impact;"/>
         <input type="submit" style="width:8%;"/>
      </form>
        <p style="text-align:left;margin-left:2%;font-family:impact;font-size:120%;color:black;">
	         Lecture Notes
        </p>
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="lecture"  style="margin-left:2%;font-family:impact;"/>
         <input type="submit" style="width:8%;"/>
      </form>
        <p style="text-align:left;margin-left:2%;font-family:impact;font-size:120%;color:black;">
	         Practice Problems
        </p>
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="practiceproblems"  style="margin-left:2%;font-family:impact;"/>
         <input type="submit" style="width:8%;"/>
      </form>


   </body>
</html>
