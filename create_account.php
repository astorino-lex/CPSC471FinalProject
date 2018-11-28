<html>
  <head>
	   <title>KickstartU Create Account</title>
  <head>

  <body style="background-color:crimson;">
    <p style="text-align:center;padding-top:75px"><image src="logo.png" class="img-responsive" alt="centered image"></p>
    <p style="text-align:center;padding-top:50px;font-family:impact;font-size:120%;color:black;">
        Get started with KickstartU,<BR> create an account!</p>
    <form action="create_account_tmp.php" method=POST onsubmit="myFunction(event)"
        style="padding-top:5px;text-align:center;font-family:impact;font-size:120%;color:black;">
      First Name: <input type=TEXT name="first_name"
        style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:15%;"
        required><P>
      Last Name: <input type=TEXT name="last_name"
        style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:15%;"
        required><P>
      Email: <input type=TEXT name="user_email" minlength="8"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:15%;"
          required><P>
      Password: <input type=PASSWORD name="password" minlength="8"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:10%;"
          required><P>
      Year of Study: <input type=TEXT name="year_of_study" maxlength="1"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:15%;"
          required><P>
      Faculty: <input type=TEXT name="faculty" minlength="4"
          placeholder="ie. Haskayne School of Business, Arts"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:18%;"
          required><P>
      Faculty 2: <input type=TEXT name="faculty2" minlength="4"
          placeholder="(not required)"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:18%;"><P>
      Degree Program: <input type=TEXT name="degree_program" minlength="3"
          placeholder="ie. Software Engineering, Marketing"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:18%;"
          required><P>
      Degree Program 2: <input type=TEXT name="degree_program2" minlength="3"
          placeholder="(not required)"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:18%;"><P>
      <input type=SUBMIT value="Create Account"
      style="font-family:impact;font-size:90%;width:15%;"><P>

      <input type="button" value="Back to login" onclick="location='login_page.php'"
            style="margin-right: 60%;font-family:impact;font-size:90%;width:15%;"/><P>


        <script type="text/javascript">
        function myFunction(event) {
          var a = confirm("By clicking OK, you are agreeing to KickstartU's following Terms & Conditions:" +
            " We are not responsible for any academic misconduct or plagiarism as we are not affiliated with any University" +
            " listed on our website. Please post at your own risk.");
          if (a){
            window.location.href = 'create_account_tmp.php';
          }
          else {
            event.preventDefault();
            window.location.href = 'create_account.php';
          }
        }
        </script>

  </body>
</html>
