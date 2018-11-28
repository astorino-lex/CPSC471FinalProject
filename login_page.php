<html>
  <head>
	   <title>KickstartU Login</title>
  <head>

  <body style="background-color:crimson;">
    <p style="text-align:center;padding-top:75px"><image src="logo.png" class="img-responsive" alt="centered image"></p>
    <form action=process_form.php method=POST
          style="padding-top:80px;text-align:center;font-family:impact;font-size:120%;color:black;">
  	   Email: <input type=TEXT name="user_email"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:15%;"
          required><BR>
  	   Password: <input type=PASSWORD name="password"
          style="display:inline-block;vertical-align:middle;border: 1px solid black;padding: 3px 3px;width:10%;"
          required><P>
  	  <input type=SUBMIT value="Login" style="font-family:impact;font-size:90%;width:8%;"><P>

        <!--BUTTONS-->
        <input type="button" value="Create Account" onclick="location='create_account.php'"
              style="font-family:impact;font-size:90%;width:15%;" />
	   </form>
  </body>
</html>
