<!---Shane Gibbons / K00097327--->
<!---02/05/2013--->
<!---Wind Turbine Process Analyser--->
<!---Public Log in Page--->


<?php
//Start a session
session_start();
?>


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
<h2>Public Log In</h2>

<?php

if(isset($_SESSION['logoncount']))
{
	$_SESSION['logoncount']++;  //Increment for every logon attempt
    }
      else
    {
	$_SESSION['logoncount']=0;  //Nr of failed login attempts initially zero
    }


 ?>
 
<!--The following php code is going to check the username and password which was entered in by the user
in the form below. If it is in the database, if all fields are filled in and if the password matches
the user will be logged in--->
 <?php
     
	  include("MySQL2_open_connection.php");
	  

                 //if the login form is submitted.... 
  
                 if (isset($_POST['submit'])) {    // if form has been submitted



                 // ..makes sure user filled it in....

 	             if(!$_POST['username'] | !$_POST['pass']) 
		        {
 		         die('You did not fill in a required field.');
 	            }
   
   
   
		
		
 	                 //checks if the username is in use by calling a stored procedure to
				     //check the username given by the user against everything in the user table

 	                 if (!get_magic_quotes_gpc()) 
		            {
 	                 $_POST['username'] = addslashes($_POST['username']);
 	                }
					
					 $username = $_POST['username'];
		
 	                 $check = mysqli_query($connection,"call userselect2('$username')")or die(mysqli_error($connection));
					 

		 
		
                     // and it will give errors if user dosen't exist

                     $check2 = mysqli_num_rows($check);

                     if ($check2 == 0) 
		             {
 		              die('That user does not exist in our database.');
 		             }
		
		
		             //If it does match a user in the database, hide the password and encrypt it.
	                 while($info = mysqli_fetch_array( $check )) 	
                     {
                     $_POST['pass'] = stripslashes($_POST['pass']);
		  
		  
 	                 $info['password'] = stripslashes($info['password']);
		                 	 
				     //Encrypts password
 	                 $_POST['pass'] = md5($_POST['pass']);
						 
					 $username = $_POST['username'];
						 
                        
						 
	  

                 //error is outputed if password is wrong

 	             if ($_POST['pass'] != $info['password']) 
			    {
 		         die('Incorrect password, please try again.');

 	            }
  
                 else 

                { 
		         // if login is ok then add a cookie 
	
 	             $_POST['username'] = stripslashes($_POST['username']); 
 	             $hour = time() + 3600; 
                 setcookie(ID_user, $_POST['username'], $hour); 
                 setcookie(Key_user, $_POST['pass'], $hour);	 

 
 
 

           if ($check)  //Logon is successful - redirect to restricted home page
	    {
	        $_SESSION['username']=$username; //Save the username in a session variable
	        if(isset($_SESSION['views']))
	  
	        {
	        $_SESSION['views'] = $_SESSION['views']+ 1;
	        }
	  
	        else
	        {
	        $_SESSION['views'] = 1;
	        } //set the session variable views
	        unset($_SESSION['logoncount']);//Unset the logon tracking count
	        header('Location: home.php?success=true'); //display the restricted page
	        exit();
			
	    }
	  else	//Logon has failed - reload the logon page
	{
	 unset($_SESSION['views']);
   }
  }  
 } 
} 

    else 
    {	 

?> 

  
  
  
  
  
  

<!---Log in form--->
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 

  <table border="0"> 


	 
     <tr><td>Username:</td><td> 

     <input type="text" name="username" maxlength="40"> 

     </td></tr> 

	 
     <tr><td>Password:</td><td> 

     <input type="password" name="pass" maxlength="50"> 

     </td></tr> 

	 
     <tr><td colspan="2" align="right"> 

     <input type="submit" name="submit" value="Login"> 

     </td></tr> 

   </table> 

 </form> 

 
 
<?php 
   mysqli_close($connection);
   } 
 ?> 

 
 <!---This code checks to see if the user log in was successful.
 it does this by checking the database and comparing the cookies
 with your information in them, against what is in the user table.--->
<?php

  // Connects to Database 
	 
	 include("MySQL2_open_connection.php");


		 
	  
             //Checks if there is a login cookie....

             if(isset($_COOKIE['ID_user']))

             //..if there is, it logs user in and directes him/her to the home page

            { 
 	         $username = $_COOKIE['ID_user']; 
 	         $pass = $_COOKIE['Key_user'];
			 
 	 	     $check = mysqli_query($connection,"call userselect2('$username')")or die(mysqli_error());

			 
			 
			 
 	         while($info = mysqli_fetch_array( $check )) 	
 		    {
 		     if ($pass != $info['password']) 
         
		    {
		                              }
		

 		     else
 		    {
 		     header("Location: index.php");
            }

 	   }

 }
 mysqli_close($connection);
?>
 
</div>

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
			<li class="first"><a href= index2.php>Public Log In</a></li>
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


</body>
</html>
