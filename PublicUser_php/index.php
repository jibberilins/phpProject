<!---Shane Gibbons / K00097327--->
<!---02/05/2013--->
<!---Wind Turbine Process Analyser--->
<!---Registration Page--->

<!DOCTYPE html>
<html>
<head>

  
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title>Wind Turbine Process Analyser</title>
     <meta name="keywords" content="" />
     <meta name="description" content="" />
     <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700|Archivo+Narrow:400,700" rel="stylesheet" type="text/css">
     <link href="default2.css" rel="stylesheet" type="text/css" media="all" />
     <!--[if IE 6]>
     <link href="default_ie6.css" rel="stylesheet" type="text/css" />
     <![endif]-->


</head>
<body>
<!---CSS Wrapper for header of page--->
<div id="header" class="container">

<!---CSS Wrapper for logo--->
<div id="logo">
    <h1><a><font color=ff00ff>S</font>
	<font color=ff00cc>u</font>
	<font color=ff0099>s</font>
	<font color=ff0066>t</font>
	<font color=ff0033>a</font>
	<font color=ff0000>i</font>
	<font color=ff3300>n</font>
	<font color=ff6600>a</font>
	<font color=ff9900>b</font>
	<font color=ffcc00>l</font>
	<font color=ffff00>e<br /></font>
	<font color=ccff00>T</font>
	<font color=99ff00>o</font>
	<font color=66ff00>o</font>
	<font color=33ff00>l</font>
	<font color=00ff00>s</font></a></h1>
</div>	
</div>


<!--CSS Wrappers for page and content--->
<div id="page" class="container">
<div id="content">
<h2>Registration</h2>


<!--The following php code is going to check the username and password which was entered in by the user
in the form below. If it is not in the database, if all fields are filled in and if the password matches
the users username will be approved--->

<?php 
     // Connects to your Database 

     include("MySQL2_open_connection.php");


	 
         //This code will run if the form has been fully submitted

         if (isset($_POST['submit'])) { 


	 

	 
	 
	 
             //This section makes sure no fields are left blank

             if (!$_POST['username'] | !$_POST['email'] | !$_POST['pass'] | !$_POST['pass2'] ) 
		     {

 		     die('You did not complete all of the required fields');

 	         }



		
	 
                //checks if the username is in use by calling a stored procedure to
				//check the username given by the user against everything in the user table

 	            if (!get_magic_quotes_gpc()) 
		        {
 		         $_POST['username'] = addslashes($_POST['username']);
 	            }
                 $usercheck = $_POST['username'];
                 $check = mysqli_query($connection,"call userselect1('$usercheck')") or die(mysqli_error());
                 $check2 = mysqli_num_rows($check);

		 
                     //if the name exists already in the database it gives an error

                     if ($check2 != 0) 
		            {

 		             die('Sorry, the username '.$_POST['username'].' is already in use.');

 		            }
					
                         //This sections compares both passwords entered to see if they match

 	                      if ($_POST['pass'] != $_POST['pass2']) 
		                {

 		                 die('Your passwords did not match. ');

 	                    }
						
 	             //password is then encrypted

 	             $_POST['pass'] = md5($_POST['pass']);
				
                 //password and username are hidden using a method called addslashes
 	             if (!get_magic_quotes_gpc()) 
		        {
 		         $_POST['pass'] = addslashes($_POST['pass']);
 		         $_POST['username'] = addslashes($_POST['username']);
 	            }
				
				mysqli_close($connection);
?>




<!---This next section of code checks the email the user entered in against the database--->
<?php
// Connects to your Database 

     include("MySQL2_open_connection.php");


	 
         //This code will run if the form has been fully submitted

         if (isset($_POST['submit'])) { 





                //checks if the email is in use by calling a stored procedure to
				//check the email given by the user against everything in the user table

                if (!get_magic_quotes_gpc()) 
		        {

 		         $_POST['email'] = addslashes($_POST['email']);
 	            }
                 $emailcheck = $_POST['email'];

				 
                 $checkemail = mysqli_query($connection,"call emailselect('$emailcheck')") or die(mysqli_error());
                 $check3 = mysqli_num_rows($checkemail);

		 
		

                     //if the name exists already in the database it gives an error

                     if ($check3 != 0) 
		            {

 		             die('Sorry, the E-Mail '.$_POST['email'].' is already in use.');

 		            }


                if (!get_magic_quotes_gpc()) 
				
		        {
                 $_POST['email'] = addslashes($_POST['email']);
 	            }
		}
	
		mysqli_close($connection);


?>



<?php
          
			

         // then the new user is inserted into the database using an insert stored procedure
		 //and the datawhich was entered in by the user
         include("MySQL2_open_connection.php");
		 
		 $usercheck = $_POST['username'];
		 $pass      = $_POST['pass'];
		 $email     = $_POST['email'];

 	     $insert =  ("CALL insertuser1('$usercheck', '$pass', '$email')") or die(mysqli_error());
		 
 	     $add_member = mysqli_query($connection,$insert);

 ?>


<h1>Registration Succesful!</h1>



 <p1><b>Thank you, you have registered - you may now login</a>.</b></p1>


<br>


<?php 

} 
else 
{	

?>


<!---user Registration form--->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

     <table border="0">

     <tr><td>Username:</td><td>

     <input type="text" name="username" maxlength="60">

     </td></tr>
	 
	 
	 <tr><td>E-Mail:</td><td>

     <input type="text" name="email" maxlength="60">

     </td></tr>
	 

     <tr><td>Password:</td><td>

     <input type="password" name="pass" maxlength="10">

     </td></tr>
	 

     <tr><td>Confirm Password:</td><td>

     <input type="password" name="pass2" maxlength="10">

     </td></tr>
	 

     <tr><th colspan=2><input type="submit" name="submit" 
     value="Register"></th></tr> </table>

</form>


<?php
    mysqli_close($connection);
     }
	 
?>  



 
</div>

<!---CSS Wrapper for the sidebar--->
<div id="sidebar">
		<div id="sbox1">
			<ul class="list-style1">
				<li class="first">
				<p><img src="images/public.png" width="100" height="100" alt="" /></p>
                </li>
			</ul>
		</div>
    </div>	

</div>



<!---CSS Wrapper for the footer. Included in the CSS for the footer is the black image for the background--->
<div id="footer" class="container">
<div id="fbox1">
		<h2>Want to Register with Us?</h2>
		<ul class="style1">
			<li class="first"><a href= index.php >Register</a></li>
			<li><a href= About.php >Read About us here!!</a></li>
		</ul>
	</div>
	
	<div id="fbox2">
		<h2>What if your Already Registered?</h2>
		<ul class="style1">
			<li class="first"><a href= index2.php>Public log In</a></li>
		</ul>
	</div>
	
	<div id="fbox3">
		<h2>Social Connections</h2>
		<p>Share this site on your relevant social network!</p>
		<ul class="style2">
			<li><a href="http://www.facebook.com"><img src="images/social03.png" width="32" height="32" alt="" /></a></li>
			<li><a href="http://www.twitter.com"><img src="images/social01.png" width="32" height="32" alt="" /></a></li>
			<li><a href="http://www.google.com"><img src="images/social04.png" width="32" height="32" alt="" /></a></li>
			<li><a href= Admin_index2.php ><img src="images/admin.png" width="32" height="32" alt="" /></a></li>
		</ul>
	</div>
	
</div>


<div id="copyright" class="container">
	<p>Copyright (c) 2013 All rights reserved. Graphics by <a href="http://www.freecsstemplates.org">FCT</a>.</p>
</div>

<!---Ending HTML tags--->
</body>
</html>
