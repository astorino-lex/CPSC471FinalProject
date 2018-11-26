<?php
session_start();
$course_name = $_SESSION['c_name'];
$course_id = $_SESSION['c_id'];
if(isset($_FILES['lecture'])){
      $errors= array();
      $file_name = $_FILES['lecture']['name'];
      $file_size =$_FILES['lecture']['size'];
      $file_tmp =$_FILES['lecture']['tmp_name'];
      $file_type=$_FILES['lecture']['type'];
     // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$file_ext=explode('.',$_FILES['lecture']['name']);
		$file_ext = end($file_ext);
		$file_ext = strtolower($file_ext);
      $expensions= array("jpeg","jpg","png", "docx", "pdf");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be less than 2 MB';
      }

      if(empty($errors)==true){
		  $tmpdir = $course_name.$course_id."/lectures/";
		  if(!is_dir($tmpdir))
			mkdir($tmpdir, 0755, true);
		move_uploaded_file($file_tmp,$tmpdir.$file_name);
      }else{
         print_r($errors);
      }
   }
   if(isset($_FILES['lab'])){
      $errors= array();
      $file_name = $_FILES['lab']['name'];
      $file_size =$_FILES['lab']['size'];
      $file_tmp =$_FILES['lab']['tmp_name'];
      $file_type=$_FILES['lab']['type'];
     // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$file_ext=explode('.',$_FILES['lab']['name']);
		$file_ext = end($file_ext);
		$file_ext = strtolower($file_ext);
      $expensions= array("jpeg","jpg","png", "docx", "pdf");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be exactly 2 MB';
      }

      if(empty($errors)==true){
		  $tmpdir = "data/".$course_name.$course_id."/lab/";
		  if(!is_dir($tmpdir))
			mkdir($tmpdir, 0755, true);
		move_uploaded_file($file_tmp,$tmpdir.$file_name);
      }else{
         print_r($errors);
      }
   }
   if(isset($_FILES['assignment'])){
      $errors= array();
      $file_name = $_FILES['assignment']['name'];
      $file_size =$_FILES['assignment']['size'];
      $file_tmp =$_FILES['assignment']['tmp_name'];
      $file_type=$_FILES['assignment']['type'];
     // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$file_ext=explode('.',$_FILES['assignment']['name']);
		$file_ext = end($file_ext);
		$file_ext = strtolower($file_ext);
      $expensions= array("jpeg","jpg","png", "docx", "pdf");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be exactly 2 MB';
      }

      if(empty($errors)==true){
		  $tmpdir = $course_name.$course_id."/assignment/";
		  if(!is_dir($tmpdir))
			mkdir($tmpdir, 0755, true);
		move_uploaded_file($file_tmp,$tmpdir.$file_name);
      }else{
         print_r($errors);
      }
   }
?>
<html>
<Title>
Upload Content
</title>
<body style="background-color:crimson;">
		<p style="text-align:right;padding-top:75px;padding-right:50px;"><image src="logo.png" class="img-responsive" alt="centered image"
				height="100", width="300"></p>
<input type="button" value="Go back" onclick="history.go(-1);"
						style="margin-left: 80%;font-family:impact;font-size:90%;width:15%;color:black;"><P>
   <body>
	Assignment help
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="assignment" />
         <input type="submit"/>
      </form>
	Lab help
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="lab" />
         <input type="submit"/>
      </form>
	Lecture Notes
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="lecture" />
         <input type="submit"/>
      </form>


   </body>
</html>
<!-- <html>
    <body>
        <form action="student_upload_content_tmp.php" method="post"
                                       enctype="multipart/form-data">
            <label for="file">Select file to upload: </label>
            <input type="file" name="uploadFile" id = "file">
            <br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html> -->
