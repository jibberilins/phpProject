<!---Shane Gibbons / K00097327--->
<!---02/05/2013--->
<!---Wind Turbine Process Analyser--->
<!---Admin user management file--->


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
     <link href="default.css" rel="stylesheet" type="text/css" media="all" />
     <!--[if IE 6]>
     <link href="default_ie6.css" rel="stylesheet" type="text/css" />
     <![endif]-->
	 
	 
</head>
<body>
<div id="header" class="container">

<?php
ob_start();


   if(isset($_SESSION['Adminviews']))  
	{
	//If the session variable views is set we have a valid logged on user
	//Put the restricted page content here
    $_SESSION['Adminviews'] = $_SESSION['Adminviews']+ 1;

	
	}
else
	{
	
	
	//If the session variable views is NOT set we do not have a valid logged on user
	//Put the redirection here
    echo "<h1>Session Expired</h1>";
	echo "You will be redirected to the login page in 5 seconds";
	echo '<meta http-equiv="Refresh" content="5;url=index.php" />';
	}
	
	
?>
	
	
<!---CSS id tag for the website logo--->
	<div id="logo">
    <h1><a href= AdminHome.php ><font color=ff00ff>S</font>
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

<!---CSS id tag for the website menu--->	
	<div id="menu">
		<ul>
			<li><a class="link-style1" href= Adminhome.php >Homepage</a></li>
			<li><a class="link-style2" href= AdminAccount.php >Your Account</a></li>
			<li><a class="link-style3" href= AdminAnalyser.php>Process Analyser</a></li>
			<li><a class="link-style4" href= AdminContact.php >Contact</a></li>
			<li><a class="link-style5" href= Admin_logout.php >Logout</a></li>
		</ul>
	</div>
	
</div>

<!---CSS id tag for the website page and container--->
<div id="page" class="container">
	
	<h2>Welcome Administrator to your user control page</h2>	
	
	
	
	
<?php	
ob_start();
 if(isset($_COOKIE['ID_admin']))
 {     
	 
     include("MySQLAdmin_open_connection.php");
	 	
		
   
//The following stored procedure calls all the usernames from the users table	
     $resultA = mysqli_query($connection,"call Adminjob()");
	 $numA = mysqli_num_rows($resultA);

	 
	    if (!$resultA)
	    {
		 die( mysqli_error());
	    }

		
		if($resultA!=null)
	    {
                              
			if ($numA!=0)
		    {
               
					
							
	?>						      
       
               <!---The following form is a drop down list of all the members of this site.
			   It is populated by the stored procedure above--->   
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">		
				
				
					<table>
						
						<tr><td>Please Select a User:</td><td>
					    <select name ="userlist" id="list">
						<option value ="">--- Select ---</option>
						
						<?php
						while ($rowA = mysqli_fetch_array($resultA))
                         {	
						?>
						
			
                         <option><?php echo $rowA['username'] ?></option>
						 
						 
                         <?php
                         }	
						  ?>
						 
						 </select>
                         </td></tr>
						 
						 
                         <tr><th colspan=2><input type= "submit" name= "show2" value= "Show User"></th></tr>
						 
			   	 	 
					</table>
					</form> 
                
								
						
<?php	
				
			}
									
	            else //An invalid selection result has been entered
		        {
			     echo "The user ".$_POST['userlist']." has been deleted.";
		        }
                echo "<hr>";

        }   				 
        else 	
        {
	     /*
		   A NULL value is entered
	       This means the user has hit the Execute Query button
	       but has not entered anything into the form
		 */
	     echo '<b>Please select a user from the list above.</b>';
        }

    }
     else
    {
	 header("Location: home.php");
    }

	
// Closes the MySQL connection
mysqli_close($connection);					
?>	









<?php
include("MySQLAdmin_open_connection.php");


    $Admincheck = "";
    if(isset($_POST['userlist']))
    {
	
	
//The following stored procedure displays all the user information for the user selected from the 
//drop down list above.
     $Admincheck = $_POST['userlist'];
     $Aresult = mysqli_query($connection,"call userselect1('$Admincheck')");
	 $Arow = mysqli_fetch_array($Aresult);
	 
	//Session given to the selected user 
	 $_SESSION['delete_id']= $Arow[0];
	 
	  
 				  
?>                        
                        <!---This form is used to display the information retrieved by the stored procedure above--->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<table>
						   <tr><td>Username: </td><td>
                         <input type = "text" name = "AdminName" disabled="true" value ="<?php echo $Arow['1']?>"/>
						   </td></tr>
						
						  
						   <tr><td>Password: </td><td>
                         <input type = "text" value ="<?php echo $Arow['2']?>" name = "Password" disabled="true" />
						   </td></tr>
						   
						    
						   <tr><td>E-Mail: </td><td>
                         <input type = "text" value ="<?php echo $Arow['3']?>" name = "E-Mail" disabled="true" />
						   </td></tr>
						  
						   
						   <tr><td>First Name: </td><td>
                         <input type = "text" value ="<?php echo $Arow['4']?>" name = "firstname" disabled="true" />
						   </td></tr>
						  
						   
						   <tr><td>Last Name: </td><td>
                         <input type = "text" value ="<?php echo $Arow['5']?>" name = "lastname" disabled="true" />
						   </td></tr>
						   
						   
						   <tr><td>Day of Birth: </td><td>
                         <input type = "text" value ="<?php echo $Arow['6']?>" name = "dobD" disabled="true" />
						   </td></tr>
						 
						   
						   <tr><td>Month of Birth: </td><td>
						 <input type = "text" value ="<?php echo $Arow['7']?>" name = "dobM" disabled="true" />
						   </td></tr>
					
						   
						   <tr><td>Year of Birth: </td><td>
						 <input type = "text" value ="<?php echo $Arow['8']?>" name = "dobY" disabled="true" />
						   </td></tr>
						
						   
						   <tr><td>Phone No: </td><td>
						 <input type = "text" value ="<?php echo $Arow['9']?>" name = "phoneNo" disabled="true" />
						   </td></tr>
						  
						   
						   <tr><td>Description: </td><td>
                         <input type = "text" name = "descrip" disabled="true" value ="<?php echo $Arow['10']?>"/>
						   </td></tr>
						   
						   <tr><td></td><td>
						   <input colspan=2 type= "submit" name= "userdelete" value= "Delete"/>
						   </td></tr>
						   
						   </table>
                          </form>
		
						 
                   
<?php

}
  mysqli_close($connection);

?>
				   

<?php
//The following piece of code enables the delete function on this page. The administrator has the option to delete
//users selected from the drop down list above.
include("MySQLAdmin_open_connection.php");


if(isset($_POST['userdelete']))
{



	//Sesion of the selected user is displayed
	 $userdelete = $_SESSION['delete_id'];
	 
    //This stored procedure then initiates the delete function using the session of the selected user
	//from the drop down list above. It deletes all information related to this user.
     $Dresult = mysqli_query($connection,"call delete_user('$userdelete')");
	 
	 //the mysqli_affected_rows method displays the number of rows which remain after the deletion
	 if ($Dresult)
	    {
		 echo "Affected rows (DELETE): \n User Number ". mysqli_affected_rows($connection);
         echo " deleted successfully!";
		 
	    }
	      else
		{
						
		die(mysqli_error());
						 
        }
						
	}
    else
    {
     echo "If you would like to delete this user, just press the button above.";
    }	
mysqli_close($connection);
?>

				   
				   
				   


	
</div>






<?php

//Connect to the database
      
	 include("MySQLAdmin_open_connection.php");
	 
	   
	    
		
	   //this section checks the logged cookies to see if the are logged in
	    
		if(isset($_COOKIE['ID_admin']))
		
	{
		
		    $username = $_COOKIE['ID_admin'];
		    $pass = $_COOKIE['Key_admin'];
		   
		    $checkadmin = mysqli_query($connection,"call Adminselect('$username')") or die(mysqli_error());
			   
		    while($info = mysqli_fetch_array($checkadmin))
			   
	    {
			    
				
				
		    //if the password the cookie has stored for the current logged in user does not match the password
                  //entered by the user, they are taken to the login page...

                        
                          
            if ($pass != $info['password'])

            {	
              header("Location: index2.php");
            }

            //if the specific passwords match, the user is shown the Members area...

        }
    }
    else

            //if the cookie does not exist at all, they are taken to the login page...

            {
              header("Location: home.php");
            }
								
mysqli_close($connection);
?>





<!---CSS id tag for the website footer--->
<div id="footer" class="container">
	<div id="fbox1">
		<h2>Want to Contact Us?</h2>
		<ul class="style1">
			<li class="first"><a href= Contact.php >Contact Questions</a></li>
			<li><a href= Contact.php >Contact Info</a></li>
		</ul>
	</div>
	
	<div id="fbox2">
		<h2>News & Content</h2>
		<ul class="style1">
			<li class="first"><a href= home.php>Top Wind Turbine Articles of the Day</a></li>
			<li><a href= Account.php >Your Account</a></li>
			<li><a href= chatforum.php >Message Forum</a></li>
			<li><a href= Analyser.php >Wind Turbine calculator</a></li>
		</ul>
	</div>
	
	<div id="fbox3">
		<h2>Social Connections</h2>
		<p>Share this site on your relevant social network!</p>
		<ul class="style2">
			<li><a href="http://www.facebook.com"><img src="images/social03.png" width="32" height="32" alt="" /></a></li>
			<li><a href="http://www.twitter.com"><img src="images/social01.png" width="32" height="32" alt="" /></a></li>
			<li><a href="http://www.google.com"><img src="images/social04.png" width="32" height="32" alt="" /></a></li>
			<li><a href= Admin.php ><img src="images/admin.png" width="32" height="32" alt="" /></a></li>
		</ul>
	</div>
	
</div>



<div id="copyright" class="container">
	<p>Copyright (c) 2013 All rights reserved. Graphics by <a href="http://www.freecsstemplates.org">FCT</a>.</p>
</div>
</body>
</html>
