<!---Shane Gibbons / K00097327--->
<!---02/05/2013--->
<!---Wind Turbine Process Analyser--->
<!---Public Account Page--->


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

include("MySQL2_open_connection.php");

if(isset($_SESSION['views']))  
	{
	//If the session variable views is set we have a valid logged on user
	//Put the restricted page content here
    $_SESSION['views'] = $_SESSION['views']+ 1;

	
	
	}
  else
	{
	
	
	//If the session variable views is NOT set we do not have a valid logged on user
	//Put the redirection here
    echo "<h1>Session Expired</h1>";
	echo "You will be redirected to the login page in 5 seconds";
	echo '<meta http-equiv="Refresh" content="5;url=index.php" />';
	}
	
	
mysqli_close($connection);
?>




	<div id="logo">
    <h1><a href= Home.php ><font color=ff00ff>S</font>
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
	
	
	
	
	<div id="menu">
		<ul>
		    <li><a class="link-style1" href= home.php >Homepage</a></li>
			<li><a class="link-style2" href= Account.php >Your Account</a></li>
			<li><a class="link-style3" href= Analyser.php>Process Analyser</a></li>
			<li><a class="link-style4" href= Contact.php >Contact</a></li>
			<li><a class="link-style5" href= logout.php >Logout</a></li>
		</ul>
	</div>
	
</div>





<div id="page" class="container">
	<div id="Account_content">
	<p><img src="people.jpg" width="750" height="450" alt="" /></p>
	<h1>Welcome to Your Account</h1> 
	
	<div id = "space"></div>
	
	 <div id = "Form1">
	 <h2>User Information Form</h2>

<!---The following code is the code for the form the user is allowed to use to update their information--->	 
<?php
ob_start();


 include("MySQL2_open_connection.php");

 
						?>
                         <form method="post">

                           <table border="0">

                             <tr><td>Username:</td><td>

                             <input type="text" name="username1" maxlength="60">

                             </td></tr>
	 
	 
	                         <tr><td>E-Mail:</td><td>

                             <input type="text" name="email1" maxlength="60">

                             </td></tr>
	 

                             <tr><td>Password:</td><td>

                             <input type="password" name="password1" maxlength="10">

                             </td></tr>
							 
							 
							 <tr><td>FirstName:</td><td>

                             <input type="text" name="first" maxlength="60">

                             </td></tr>
							 
							 
							 <tr><td>LastName:</td><td>

                             <input type="text" name="last" maxlength="60">

                             </td></tr>
							 
							 <tr><td>Day:</td><td> 
                            <select name="dob1" id="form-dob-day">
		                      <option value="EBTG">1</option>
		                      <option>2</option>
		                      <option>3</option>
		                      <option>4</option>
		                      <option>5</option>
		                      <option>6</option>
							  <option>7</option>
		                      <option>8</option>
		                      <option>9</option>
							  <option>10</option>
		                      <option>11</option>
		                      <option>12</option>
							  <option>13</option>
		                      <option>14</option>
		                      <option>15</option>
							  <option>16</option>
		                      <option>17</option>
		                      <option>18</option>
							  <option>19</option>
		                      <option>20</option>
		                      <option>21</option>
							  <option>22</option>
		                      <option>23</option>
		                      <option>24</option>
							  <option>25</option>
		                      <option>26</option>
		                      <option>27</option>
							  <option>28</option>
		                      <option>29</option>
		                      <option>30</option>
							  <option>31</option>
                            </select>
							 </td></tr>
							 
							 
							  <tr><td>Month:</td><td> 
                            <select name="dob2" id="form-dob-month">
		                      <option value="EBTG">1</option>
		                      <option>2</option>
		                      <option>3</option>
		                      <option>4</option>
		                      <option>5</option>
		                      <option>6</option>
							  <option>7</option>
		                      <option>8</option>
		                      <option>9</option>
							  <option>10</option>
		                      <option>11</option>
		                      <option>12</option>
                            </select>
							 </td></tr>
							 
							 
							  <tr><td>Year:</td><td> 
                            <select name="dob3" id="form-dob-Year">
		                      <option>1901</option>
		                      <option>1902</option>
		                      <option>1903</option>
		                      <option>1904</option>
		                      <option>1905</option>
		                      <option>1906</option>
							  <option>1907</option>
		                      <option>1908</option>
		                      <option>1909</option>
							  <option>1910</option>
		                      <option>1911</option>
		                      <option>1912</option>
							  <option>1913</option>
		                      <option>1914</option>
		                      <option>1915</option>
							  <option>1916</option>
		                      <option>1917</option>
		                      <option>1918</option>
							  <option>1919</option>
		                      <option>1920</option>
		                      <option>1921</option>
							  <option>1922</option>
		                      <option>1923</option>
		                      <option>1924</option>
							  <option>1925</option>
		                      <option>1926</option>
		                      <option>1927</option>
							  <option>1928</option>
		                      <option>1929</option>
		                      <option>1930</option>
							  <option>1931</option>
		                      <option>1932</option>
		                      <option>1933</option>
		                      <option>1934</option>
		                      <option>1935</option>
		                      <option>1936</option>
							  <option>1937</option>
		                      <option>1938</option>
		                      <option>1939</option>
							  <option>1940</option>
		                      <option>1941</option>
		                      <option>1942</option>
							  <option>1943</option>
		                      <option>1944</option>
		                      <option>1945</option>
							  <option>1946</option>
		                      <option>1947</option>
		                      <option>1948</option>
							  <option>1949</option>
		                      <option>1950</option>
		                      <option>1951</option>
							  <option>1952</option>
		                      <option>1953</option>
		                      <option>1954</option>
							  <option>1955</option>
		                      <option>1956</option>
		                      <option>1957</option>
							  <option>1958</option>
		                      <option>1959</option>
		                      <option>1960</option>
							  <option>1961</option>
		                      <option>1982</option>
		                      <option>1983</option>
		                      <option>1984</option>
		                      <option>1985</option>
		                      <option>1986</option>
							  <option>1987</option>
		                      <option>1988</option>
		                      <option>1989</option>
							  <option>1990</option>
		                      <option>1991</option>
		                      <option>1992</option>
							  <option>1993</option>
		                      <option>1994</option>
		                      <option>1995</option>
							  <option>1996</option>
		                      <option>1997</option>
		                      <option>1998</option>
							  <option>1999</option>
		                      <option>2000</option>
		                      <option>2001</option>
							  <option>2002</option>
		                      <option>2003</option>
		                      <option>2004</option>
							  <option>2005</option>
		                      <option>2006</option>
		                      <option>2007</option>
							  <option>2008</option>
		                      <option>2009</option>
		                      <option>2010</option>
							  <option>2011</option>
							  <option>2012</option>
							  <option value="EBTG">2013</option>
							  <option>2014</option>
							  <option>2015</option>
		                      <option>2016</option>
		                      <option>2017</option>
							  <option>2018</option>
							  <option>2019</option>
							  <option>2020</option>
                            </select>
							 </td></tr>
							 
							 
							 <tr><td>Phone No:</td><td>

                             <input type="text" name="phone" maxlength="60">

                             </td></tr>
							 
							 <tr><td>Profile:</td><td>
							 
							 <textarea name="profile" cols="27" rows="8"></textarea>
							 
							 </td></tr>
	 
                             <tr><th colspan=2><input type="submit" name="submit" 
                             value="Save Details"></th></tr> </table>

                           </form>
						   
						    <div id = "space"></div>
							 <h2>Calculated Outputs</h2> 
                             
							 
                           <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 

                           <table border="0"> 

  
                           <tr><th colspan=2><input type="submit" name="view_outputs" 
                             value="View Outputs"></th></tr> 
                            </table>

   

                            </form>  
						   
						 <?php
		
                        
						if(isset($_POST['submit']))
						
					{
						//This stored procedure updates all the information in the user table which is related to the particular user that is logged in
                        //and has filled in the form above.						
						 $usernew = $_POST['username1'];
						 $email = $_POST['email1'];
						 $pass = $_POST['password1'];
						 $firstname = $_POST['first'];
						 $lastname = $_POST['last'];
						 $dobD = $_POST['dob1'];
						 $dobM = $_POST['dob2'];
						 $dobY = $_POST['dob3'];
						 $phoneNo = $_POST['phone'];
						 $descrip = $_POST['profile'];
						 
						 $Update1 = mysqli_query($connection,"call userupdate('$usernew','$email', '$pass', '$firstname', '$lastname', '$dobD', '$dobM', '$dobY', '$phoneNo', '$descrip')");
						 
						if (!$Update1)
                        {
                         echo "error";
                        }
						else
						{
                         echo "Your Records have been updated!";
                        }
						
				    }
 
 
            
 
 
 
 
 
	
  
?>



</div>




<?php
//Connect to the database
      
	 include("MySQL2_open_connection.php");
	 
	   
	    
		
	   //this section checks the logged cookies to see if the are logged in
	    
		if(isset($_COOKIE['ID_user']))
		
	{
		
		    $username = $_COOKIE['ID_user'];
		    $pass = $_COOKIE['Key_user'];
		   
		    $check = mysqli_query($connection,"call userselect2('$username')") or die(mysqli_error());
			   
		    while($info = mysqli_fetch_array($check))
			   
	    {
			    
				
				
		    //if the password the cookie has stored for the current logged in user does not match the password
                  //entered by the user, they are taken to the login page...

                        
                          
           

            //if the specific passwords match, the user is shown the Members area...

        }
    }
    else

            //if the cookie does not exist at all, they are taken to the login page...

            {
              header("Location: index2.php");
            }
								
		      mysqli_close($connection);
?>





<div id = "Form2">

<h2>Current User Information</h2>
	


	
<!---The following code is the code for the form which displays all of the user information related to the particular user which is logged in--->	 
<?php
	  
    include("MySQL2_open_connection.php");

 
     $usernew2 = $_SESSION['username'];
     $selectinfo = mysqli_query($connection,"call userselect2('$usernew2')");
	 $numinfo = mysqli_num_rows($selectinfo);

	 
	    if (!$selectinfo)
	    {
		 die( mysqli_error());
	    }

		
		if($selectinfo!=null)
	    {
		
		
                              
			if ($numinfo!=0)
		    {
			
			
			
                    echo "<hr>";
                        
                        $useri=0;				 
                        while ($rowinfo = mysqli_fetch_array($selectinfo))
                        {
						
                         echo "<form>";
						 echo "<table>";
						 //You can see here every input field has a row variable in it. This means that what ever
						 //user is logged in, their information will be taken via stored procedure and placed here
						 //row by row
						 
						   echo '<tr><td>Username: </td><td>';
                         echo "<input type = 'text' value ='".$rowinfo['1']."'name = 'Username' disabled='true' />";
						   echo '</td></tr>';
						  
						  
						   echo '<tr><td>Password: </td><td>';
                         echo "<input type = 'text' value ='".$rowinfo['2']."'name = 'Password' disabled='true' />";
						   echo '</td></tr>';
						   
						    
						   echo '<tr><td>E-Mail: </td><td>';
                         echo "<input type = 'text' value ='".$rowinfo['3']."'name = 'E-Mail' disabled='true' />";
						   echo '</td></tr>';
						  
						   
						   echo '<tr><td>First Name: </td><td>';
                         echo "<input type = 'text' value ='".$rowinfo['4']."'name = 'firstname' disabled='true' />";
						   echo '</td></tr>';
						  
						   
						   echo '<tr><td>Last Name: </td><td>';
                         echo "<input type = 'text' value ='".$rowinfo['5']."'name = 'lastname' disabled='true' />";
						   echo '</td></tr>';
						   
						   
						   echo '<tr><td>Day of Birth: </td><td>';
                         echo "<input type = 'text' value ='".$rowinfo['6']."'name = 'dobD' disabled='true' />";
						   echo '</td></tr>';
						 
						   
						   echo '<tr><td>Month of Birth: </td><td>';
						 echo "<input type = 'text' value ='".$rowinfo['7']."'name = 'dobM' disabled='true' />";
						   echo '</td></tr>';
					
						   
						   echo '<tr><td>Year of Birth: </td><td>';
						 echo "<input type = 'text' value ='".$rowinfo['8']."'name = 'dobY' disabled='true' />";
						   echo '</td></tr>';
						
						   
						   echo '<tr><td>Phone No: </td><td>';
						 echo "<input type = 'text' value ='".$rowinfo['9']."'name = 'phoneNo' disabled='true' />";
						   echo '</td></tr>';
						  
						   
						   echo '<tr><td>Description: </td><td>';
                         echo "<input type = 'text' value ='".$rowinfo['10']."'name = 'descrip' disabled='true' />";
						   echo '</td></tr>';
						   
						   echo "</table>";
                          echo "</form>";
						 echo "<hr>";
                         $useri++;
                         
                        }
			}
			else //An invalid selection result has been entered
		        {
			     echo "<br> PlEASE fill in all fields in the entry form....Thanks....retard.<br>";
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
	     echo '<b>Please enter valid values in the form above.</b>';
        }

    


	
// Closes the MySQL connection
mysqli_close($connection);
?>


</div>

<!---the following code displays the outputs created by the user which is logged in--->
<?php
include("MySQL2_open_connection.php");



if(isset($_POST['view_outputs']))
{
   $adminname = $_SESSION['username'];
   //$Voutput = $_POST['view_outputs'];
   
//To display these outputs, the following stored procedure is used  
   $Output_result = mysqli_query($connection,"call outputCall ('$adminname')");
   $num_outputs = mysqli_num_rows($Output_result);
 
    if (!$Output_result)
	    {
		 die( mysqli_error());
	    }

		
		if($Output_result!=null)
	    {
                              
			if ($num_outputs!=0)
		    {
                    echo "<hr>";
							   
							      
                    //This is were the table headings are set up
                     echo "<table border=5>";
                     echo "<tr>";
                     echo '<td>Output ID</td>';
                     echo '<td>Output User</td>';
					 echo '<td>Turbine Used</td>';
                     echo '<td>AEO - kWh/Yr</td>';
                     echo '<td>MEO - kWh/Mth</td>';
                     echo '<td>DEO - kWh/Day</td>';
                     echo '<td>Payback Cost - &#8364</td>';
					 echo '<td>Payback Time - Yr</td>';
					 echo '<td>Wind Ratio1 - m/s</td>';
                     echo '<td>Wind Ratio2 - m/s</td>';
					 echo '<td>Electricity Cost - c/kWh</td>';
					 echo '<td>Supplier</td>';
                     echo '<tr>';

						  
                        
						   
						   

                        //Displays the data returned by the $result query
                        $Ad=0;
										 
                        while ($userrow = mysqli_fetch_array($Output_result))
                        {
                         echo "<tr>";
                         echo '<td>'.$userrow['Output_ID'].'</td>';
                         echo '<td>'.$userrow['Output_Name'].'</td>';
						 echo '<td>'.$userrow['Turbine_Name'].'</td>';
                         echo '<td>'.$userrow['AEO'].'</td>';
                         echo '<td>'.$userrow['MEO'].'</td>';
                         echo '<td>'.$userrow['DEO'].'</td>';
                         echo '<td>'.$userrow['PayC'].'</td>';
						 echo '<td>'.$userrow['PayT'].'</td>';
						 echo '<td>'.$userrow['Wind_Ratio1'].'</td>';
                         echo '<td>'.$userrow['Wind_Ratio2'].'</td>';
                         echo '<td>'.$userrow['Electricity_Cost'].'</td>';
						 echo '<td>'.$userrow['Supplier'].'</td>';
                         echo '<tr>';
                         $Ad++;
                         
                        }
						echo "</table>";
			}
									
	            else //An invalid selection result has been entered
		        {
			     echo "<br>You have produced no recent outputs.<br>";
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
	     echo '<b>Please enter valid values in the form above.</b>';
        }

    }
 

	
// Closes the MySQL connection
mysqli_close($connection);

?>



</div>
	
	
	
</div>



<?php


//this section checks the logged cookies to see if the are logged in
  if(isset($_COOKIE['ID_user']))  
    {
        //Connect to the database
	    include("MySQL2_open_connection.php");
	 

	 
	    
		
		
	
		
		    $username = $_COOKIE['ID_user'];
		    $pass = $_COOKIE['Key_user'];
		   
		    $check = mysqli_query($connection,"call userselect2('$username')") or die(mysqli_error());
			   
		    while($info = mysqli_fetch_array($check))
			   
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
              header("Location: index2.php");
            }
								
		      mysqli_close($connection);
?>






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
		</ul>
	</div>
	
</div>



<div id="copyright" class="container">
	<p>Copyright (c) 2013 All rights reserved. Graphics by <a href="http://www.freecsstemplates.org">FCT</a>.</p>
</div>
</body>
</html>
