<html>
<body>

<?php

	session_start();

	print "<h3>";
	echo strtoupper($_SESSION['c_name']." ");
	echo $_SESSION['c_id'];
	print"<br>";
	print"<br>";
	print"<br>";
	print "</h3>";

	$servername = "localhost";
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
      echo "Question ".$row['q_id'].": ".$row['content'];
      print"<br>";
      echo "Posted on: ".$row['month'];
      echo " ".$row['day'];
      echo ", ".$row['year'];
      echo " at ".$row['hours'];
      echo ":".$row['minutes'];
      print"<br>";

      $sql3 = "Select * from answer where course_name = '".$_SESSION['c_name']."' AND course_id = ".$_SESSION['c_id']." AND q_id = ".$row['q_id'];
      $answers_query = $conn->query($sql3);

      if ($answers_query)
      {
        while($row2 = $answers_query->fetch_assoc())
    		{
          echo "Answer: ".$row2['content'];
          print"<br>";
          echo "Posted on: ".$row2['month'];
          echo " ".$row2['day'];
          echo ", ".$row2['year'];
          echo " at ".$row2['hours'];
          echo ":".$row2['minutes'];
          print"<br>";
          print"<br>";
          print"<br>";
        }
      }
    }
  }

?>

<form action=student_question_tmp_page.php method=POST
      style="margin-left:25%;padding-top:20px;font-family:impact;font-size:120%;color:black;float:left;">
   Question: <input type=TEXT name="question"
      style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:80%;"
  required><BR>
  <input type=SUBMIT value="Post Question" style="font-family:impact;font-size:90%;width:80%;">
 </form>
 <form action=student_answer_tmp_page.php method=POST
      style="margin-right:25%;padding-top:20px;font-family:impact;font-size:120%;color:black;float:right;">
   Answer: <input type=TEXT name="answer"
      style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:80%;"
  required><BR>
    Question ID: <input type=TEXT name="q_id"
       style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:80%;"
   required><BR>
  <input type=SUBMIT value="Post Answer to a Question" style="font-family:impact;font-size:90%;width:80%;"><P>
 </form>

</body>
</html>
