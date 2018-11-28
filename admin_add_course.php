<html>
<body style="background-color:crimson;">
	<p style="text-align:right;padding-top:75px;padding-right:50px;"><image src="logo.png" class="img-responsive" alt="centered image"
				height="100", width="300"></p>
		<input type="button" value="Back to Home Page" onclick="location='process_form.php'"
				style="margin-left: 80%;font-family:impact;font-size:90%;width:12%;color:black;">
		<form action=admin_add_course_tmp.php method=POST
			style="padding-top:80px;text-align:center;font-family:impact;font-size:120%;color:black;">
			Course Name: <input type=TEXT name="course_name" minlength ="4" maxlength="4"
			style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:10%;"
			required><P>
			Course ID: <input type=TEXT name="course_id"  minlength ="3" maxlength="3"
			style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:10%;"
			required> <P>
			Title: <input type=TEXT name="course_title"  minlength = "8" maxlength="45"
			style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:15%;"
			required><P>
			Semester: <input type=TEXT name="course_semester"  minlength ="9"
			style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:10%;"
			required><P>
		<input type=SUBMIT value="Add Course" style="font-family:impact;font-size:90%;width:10%;"><P>

	   </form>

	</body>
<html>
