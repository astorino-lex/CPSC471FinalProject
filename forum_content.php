<?php
session_start();

$answer_unvalid = $_SESSION['answer_unvalid'];

$servername = "127.0.0.1";
$databasename = "cpsc471Project";
$username = "dylan";
$password = "password";

$conn = new mysqli($servername, $username, $password, $databasename);

$sql2 = "Select * from question where course_name = '".$_SESSION['c_name']."' AND course_id = ".$_SESSION['c_id'];
$questions_query = $conn->query($sql2);

if ($questions_query)
{
  while($row = $questions_query->fetch_assoc())
  {
    ?>
    <html>
    <body style="background-color:whitesmoke;">
    <p style="text-align:left;border:1px solid black;border-radius: 3px;padding-left:2px;
      width:40%;margin-left:20%;font-family:impact;font-size:100%;color:black;">
    <?php
    echo "Question id - ".$row['q_id'].": ".$row['content'];
    print"<br>";
    echo "Posted on: ".$row['month'];
    echo " ".$row['day'];
    echo ", ".$row['year'];
    echo " at ".$row['hours'];
    echo ":";
    if(strlen((string)$row['minutes']) == 1) {
      echo "0".$row['minutes'];
    }
    else {
      echo $row['minutes'];
    }
    print"<br>";

  $sql3 = "Select * from answer where course_name = '".$_SESSION['c_name']."' AND course_id = ".$_SESSION['c_id']." AND q_id = ".$row['q_id'];
  $answers_query = $conn->query($sql3);

  if ($answers_query)
  {
    while($row2 = $answers_query->fetch_assoc())
    {
      ?>
    </p>
    <p style="text-align:left;border:1px solid black;border-radius: 3px;padding-left:2px;
      width:40%;margin-left:30%;font-family:impact;font-size:100%;color:black;">
    <?php
      echo "Answer: ".$row2['content'];
      print"<br>";
      echo "Posted on: ".$row2['month'];
      echo " ".$row2['day'];
      echo ", ".$row2['year'];
      echo " at ".$row2['hours'];
      echo ":";
      if(strlen((string)$row2['minutes']) == 1) {
        echo "0".$row2['minutes'];
      }
      else {
        echo $row2['minutes'];
      }

    }
    ?>
  </p>
  <?php
  }
}
}
if ($answer_unvalid == TRUE){
  $_SESSION['answer_unvalid'] = FALSE;
  echo "<script type='text/javascript'>alert('The question ID was not valid, please try again.')
  window.location = 'student_forum_page.php';</script>";
}

?>

</body>
</html>
