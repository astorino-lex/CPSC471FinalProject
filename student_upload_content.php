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

<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
     // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		$file_ext=explode('.',$_FILES['image']['name']);
		$file_ext = end($file_ext);
		$file_ext = strtolower($file_ext);
      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>

      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>

   </body>
</html>
