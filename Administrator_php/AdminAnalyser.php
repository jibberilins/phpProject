<!---Shane Gibbons / K00097327--->
<!---02/05/2013--->
<!---Wind Turbine Process Analyser--->
<!---Admin Process Analyser file--->


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

include("MySQLAdmin_open_connection.php");


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
	
mysqli_close($connection);	
?>


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


<div id="page" class="container">
	<div id="content">
	<h2>View Your Turbines Details...</h2>
		<?php
ob_start();
     /*
	 This is the PHP-MySQL connection being used in this specific instance 
	 */
	 
     include("MySQLAdmin_open_connection.php");
	 

        /*
        This next section is the drop down menu form which is populated with the list
		of wind turbines models which are contained in the MySQl database table
		'turbines'.
		
		This forms name is set into $Check below and initialised into the mysql_query.
		Once the querys parameters are met by selecting a model from this drop down
		menu form, that wind turbine models specifications are then outputed into the 
		table set in below.
		
		The ""<?php echo $_SERVER['PHP_SELF']; ?>" method="post"" action is used to tell
		the apache server to load the stored version of the web page that is stored under
		$_SERVER in PHP_SELF.
        */			
?>	
        <form action= "<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

          <table border="0">

            <tr><td>Please Select your Wind Turbine Model:</td><td>
              <!---Viewing drop down form--->
              <select name ="wind" id="model">
	          <option value ="">--- Select ---</option>
	          <option value ="Bergey Excel 10kW">Bergey Excel 10kW</option>
	          <option value ="Bergey Excel 5kW">Bergey Excel 5kW</option>
	          <option value ="Unitron 650W">Unitron 650W</option>
	          <option value ="Unitron 3.3kW">Unitron 3.3kW</option>
	          <option value ="Unitron 5.1kW">Unitron 5.1kW</option>
	          <option value ="Skystream 3.7">Skystream 3.7</option>
	          <option value ="AC Green Energy PowerMax 20">AC Green Energy PowerMax 20</option>
	          <option value ="KingSpan KW3">KingSpan KW3 </option>
	          <option value ="KingSpan KW6">KingSpan KW6 </option>
	          <option value ="Evance R9000 5KW">Evance R9000 5KW</option>
              </select>
              </td></tr>

            <table border="0">  
			 
               <tr><th colspan=2><input type="submit" name="show" 
               value="SHOW Model"></th></tr>
			   	 
	        </table> 

          </table> 

             </form> 
   
 
 
<?php
    //This stored procedure drags the info of the selected turbine from the turbine table in the database.

    $Check = "";
    if(isset($_POST['wind']))
    {
     $Check = $_POST['wind'];
     $result = mysqli_query($connection,"call turbineselect1('$Check')");
	 $num = mysqli_num_rows($result);

	 
	    if (!$result)
	    {
		 die( mysqli_error());
	    }

		
		if($result!=null)
	    {
                              
			if ($num!=0)
		    {
                    echo "<hr>";
							   
							      
                    //This is were the table headings are set up
                     echo "<table border=5>";
                     echo "<tr>";
                     echo '<td>Turbine_Name</td>';
                     echo '<td>Cost - &#8364</td>';
                     echo '<td>Size</td>';
                     echo '<td>Radius - m2</td>';
                     echo '<td>Air_Density</td>';
                     echo '<td>Average_Efficiency</td>';
                     echo '<tr>';

						  
                        
						   
						   

                        //Displays the data returned by the $result query
                        $i=0;
										 
                        while ($row = mysqli_fetch_array($result))
                        {
                         echo "<tr>";
                         echo '<td>'.$row['1'].'</td>';
                         echo '<td>'.$row['2'].'</td>';
                         echo '<td>'.$row['3'].'</td>';
                         echo '<td>'.$row['4'].'</td>';
                         echo '<td>'.$row['5'].'</td>';
                         echo '<td>'.$row['6'].'</td>';
                         echo '<tr>';
                         $i++;
                         echo "</table>";
                        }
			}
									
	            else //An invalid selection result has been entered
		        {
			     echo "<br> Please select a valid wind turbine model<br>";
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
     else
    {

	 //Nothing has been entered yet in the form 
	 //and the button has not yet been pressed

	 echo 	'<b>No model has been selected. Please select your wind turbine model in the form above.</b>';
    }

	
// Closes the MySQL connection
mysqli_close($connection);

?>

<div id = "space"></div>
<h2>Calculate Your Turbines Details...</h2>
<?php
     /*
	  PHP-MySQL connection 
	 */
	 
     include("MySQLAdmin_open_connection.php");
	 

        /*
        This next section is the drop down menu form which is populated with the list
		of wind turbines models which are contained in the MySQl database table
		'turbines'.
		
		This forms name is set into $Check below and initialised into the mysql_query.
		Once the querys parameters are met by selecting a model from this drop down
		menu form, that wind turbine models specifications are then outputed into the 
		table set in below.
		
		The ""<?php echo $_SERVER['PHP_SELF']; ?>" method="post"" action is used to tell
		the apache server to load the stored version of the web page that is stored under
		$_SERVER in PHP_SELF.
        */		
?>	 

   <form action= "Admin_process_output.php""<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

          <table border="0">

            <tr><td>Please Select your Wind Turbine Model:</td><td>
              <!---Calculation Drop down form--->
              <select name ="windCal" id="modelCal">
	          <option value ="">--- Select ---</option>
	          <option value ="Bergey Excel 10kW">Bergey Excel 10kW</option>
	          <option value ="Bergey Excel 5kW">Bergey Excel 5kW</option>
	          <option value ="Unitron 650W">Unitron 650W</option>
	          <option value ="Unitron 3.3kW">Unitron 3.3kW</option>
	          <option value ="Unitron 5.1kW">Unitron 5.1kW</option>
	          <option value ="Skystream 3.7">Skystream 3.7</option>
	          <option value ="AC Green Energy PowerMax 20">AC Green Energy PowerMax 20</option>
	          <option value ="KingSpan KW3">KingSpan KW3 </option>
	          <option value ="KingSpan KW6">KingSpan KW6 </option>
	          <option value ="Evance R9000 5KW">Evance R9000 5KW</option>
            </select>
              </td></tr>
             
      
 
           
 
               <tr><td>Wind Speed 1 - m/s:</td><td> 

               <input type="text" name="speed1" maxlength="10"> 
               </td></tr> 

               <tr><td>Wind Speed 2 - m/s:</td><td> 
			 
               <input type="text" name="speed2" maxlength="10"> 
               </td></tr> 

			   <tr><td>Electricity Cost - c/kWh:</td><td> 
			 
               <input type="text" name="kWh" maxlength="10"> 
               </td></tr> 

			   <tr><td>Electricity Supplier:</td><td> 
		       
               <input type="text" name="supplier" maxlength="50"> 
               </td></tr> 

               <tr><th colspan=2><input type="submit" name="show" 
               value="Calculate"></th></tr> 			   
	 
	            
	 
	 
	    
            
	       </table> 

          </form> 



		  
		
<?php	
//This code sends the Administrator to the output screen

if (isset($_POST['windCal']))    // if calculate button has been submitted
    {
	
	
	    if (!$_POST['speed1'] | !$_POST['speed2'] | !$_POST['kWh'] | !$_POST['supplier']) 
		     {

 		     die('You did not complete all of the required fields');

 	         }
          else
        {
		
		 header("Location: Admin_process_output.php"); 

	    }
	


    }
else
{

//Nothing has been entered yet in the form 
//and the button has not yet been pressed

echo 	'<b>No model has been selected. Please select your wind turbine model in the form above.</b>';
}
    



// Closes the MySQL connection
	mysqli_close($connection);
	
?>
	</div>
	
	
<!---CSS id tag for the website sidebar--->	
	<div id="sidebar">
		<div id="sbox1">
			<h1>Calculations to Remember...</h1>
			<br />
			<br />
			<ul class="list-style1">
				<li class="first">
					<h2>Calculations</h2>
	 <p><b>AEO stands for the Annual Energy Output.</b></p>	 
	 The calculation being used is:
	 <p>AEO = Power * Area * Average turbine efficiency * Time(annual)</p>
	 <p><b>MEO stands for the Monthly Energy Output.</b></p>
	 The calculation being used is:
	 <p>MEO = Power * Area * Average turbine efficiency * Time(monthly)</p>
	 <p><b>DEO stands for the Daily Energy Output.</b></p>
	 The calculation being used is:
	 <p>DEO = Power * Area * Average turbine efficiency * Time(daily)</p>
	 <p><b>PayC stands for the Payback Cost.</b></p>
	 The calculation being used is:
	 <p>Payback cost = AEO * Cost Per Kwh.</p>
	 <p><b>PayY stands for Payback Time.</b></p>
	 The calculation being used is:
	 <p>PayBack Time = Cost of selected turbine / payback cost.</p>
				</li>
			</ul>
		</div>
    </div>	
</div>




<?php

//this section checks the logged cookies to see if the are logged in
if(isset($_COOKIE['ID_admin']))
    {
        //Connect to the database
	    include("MySQLAdmin_open_connection.php");
	 
	   
	  
		
		    $username = $_COOKIE['ID_admin'];
		    $pass = $_COOKIE['Key_admin'];
		   
		    $check = mysqli_query($connection,"call Adminselect('$username')") or die(mysqli_error());
			   
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







<!---CSS id tag for the website footer--->
<div id="footer" class="container">
	<div id="fbox1">
		<h2>Want to Contact Us?</h2>
		<ul class="style1">
			<li class="first"><a href= AdminContact.php >Contact Questions</a></li>
			<li><a href= AdminContact.php >Contact Info</a></li>
		</ul>
	</div>
	
	<div id="fbox2">
		<h2>News & Content</h2>
		<ul class="style1">
			<li class="first"><a href= Adminhome.php>Top Wind Turbine Articles of the Day</a></li>
			<li><a href= AdminAccount.php >Your Account</a></li>
			<li><a href= Adminchatforum.php >Message Forum</a></li>
			<li><a href= AdminAnalyser.php >Wind Turbine calculator</a></li>
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
