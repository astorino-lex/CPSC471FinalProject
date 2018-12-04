<?php
ob_start();
session_start();

$lecture_num = $_POST['lecture_num'];
$rating_out_of_5 = $_POST['rating_out_of_5'];
$user_email =   $_SESSION['studentname'];
$course_name = $_SESSION['c_name'];
$course_id = $_SESSION['c_id'];

$servername = "127.0.0.1";
$databasename = "cpsc471project";
$username = "dylan";
$password = "password";

$conn = new mysqli($servername, $username, $password, $databasename);

$sql = "Select * from lecture_help as a, course_content as c where a.lecture_num=".$lecture_num." AND a.content_title = c.title AND a.content_id = c.id AND c.course_name = '".$course_name."' AND c.course_id =".$course_id." AND c.approval_status = 1;";

$query = $conn->query($sql);

if($query->num_rows > 0)
{
  if($rating_out_of_5 != 1 && $rating_out_of_5 != 2 && $rating_out_of_5 != 3 && $rating_out_of_5 != 4 && $rating_out_of_5 != 5) {
        echo "<script type='text/javascript'>alert('Please choose a rating between 1 and 5!')
      	window.location = 'student_lecture_notes.php';</script>";
  }
  else {

    $sql1 = "Select * from lecture_help where lecture_num=".$lecture_num.";";

    $query = $conn->query($sql1);

    if($query)
    {
      $row = $query->fetch_assoc();
      $title = $row['content_title'];
      $content_id = $row['content_id'];
    }

    $sql2 = "Insert into rating_feedback (user_email, content_id, content_title, rating_out_of_5)";
    $sql2 = $sql2."values('".$user_email."', ".$content_id.", '".$title."', ".$rating_out_of_5.");";

    $query = $conn->query($sql2);

    header("Location:student_lecture_notes.php");
  }
}
else {
  $_SESSION['lecture_invalid'] = TRUE;
  header("Location:student_lecture_notes.php");
}

?>
