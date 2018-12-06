README.txt

********************************************************************************************************************************************
Login:
The starting page, the login page is where you will want to start the program.

	-There is no index page so you will have to use localhost/'directory_stored_in'/login_page.php

	

********************************************************************************************************************************************
Database Connection:
In order to connect to the database, you will find the connection information on lines 6, 7, 8, and 9 on process_form.php

	- Please change your MYSQL server name, database name, username, and password or the website will not be able to connect to the database.
	- In the submitted folder there is a file called cpsc471project.sql
		->	You will need to import this project into a database named cpsc471project,
			If you use any other database name it will need to be changed accordingly on line 7 of process_form.php
		
		->	This file is formatted to work on mysql 8.0 and higher, if you have any problems importing and are unable to import, please let
			know and we can export an older version for the .sql file
	- The default "127.0.0.1" servername should work fine if you are on a windows computer.
	
If you do not want to use your current MSQL root account on this website, a simple create user can be done instead which you can delete once
you have tested the website.
	- In order to create a user use the following query:
		
			GRANT ALL PRIVILEGES ON *.* TO 'dylan'@'localhost' IDENTIFIED BY 'password';
				- notice i have already inserted the username the website uses: 'dylan'
				- you will need to run this command from the command line already signed into your current MYSQL account
		
********************************************************************************************************************************************
Other Little things

The website was tested mostly on a windows host, if there are any problems with the session variables the ob_start() and session_start() will
 need to be added to the top of that file. We believe we have found most/all of the errors found on MAC for this problem, however we do 
 recommend hosting this website on a windows computer.
 
If you are hosting on a MAC or Linux operating systems

	- The website uses a mkdir() function. Windows allows this function by default. However, if you are not on windows, please grant all
		permissions to writing to the folder you are runnnig the website from (The wesbite uses the current working directory, no need to 
		grant permissions to any other folder than the current working directory).
	- 