<!---Shane Gibbons / K00097327--->
<!---02/05/2013--->
<!---Wind Turbine Process Analyser--->
<!---Public Output Page--->


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
	<div id="content">
	<h2>The Results are...</h2>
<p>



<!---When the user fills in the form on the analyser page, they are taken to this page
were the calculations are performed--->
<?php
   include("MySQL2_open_connection.php");
   
   
   
 if (!$_POST['speed1'] | !$_POST['speed2'] | !$_POST['kWh'] | !$_POST['supplier']) 
    {

 	  die('You did not complete all of the required fields');
                 
 	}
     else
    {			 
   
         $CheckR = "";
         $CheckR = $_POST['windCal'];	
	
	     //This stored procedure retrieves both the radius and the turbines average efficiency
	     $radiusEff =   mysqli_query($connection,"call selectradius('$CheckR')")or die(mysqli_error());
		
	      $rowR = mysqli_fetch_array( $radiusEff);
	       
	         //Calculation parameters 
	         $Eff = $rowR['AvEff'];
	         $radiusEff2 = $rowR['radius'];
			 $Tcost = $rowR['cost'];
	         
			 
			 //Calculation 1.1 for the Area
	         $A = 3.14 * pow($radiusEff2,2);
		
			
			
             //Calculation 1.2 for yearly uptime			
			 $UptimeY = 0.95 * 8760;
			
	
	
             //..makes sure fields filled it in...
			 $s1 = $_POST['speed1'];
		     $s2 = $_POST['speed2'];
			 $ec = $_POST['kWh'];
			 $supplier = $_POST['supplier'];
				 
				 
mysqli_close($connection);			
?>

<?php			
include("MySQLAdmin_open_connection.php");	

//Re-Check every single parameter that has been used by the user
        $s1 = $_POST['speed1'];
		$s2 = $_POST['speed2'];
	    $ec = $_POST['kWh'];
	    $supplier = $_POST['supplier'];
			 
			 
		$CheckR = $_POST['windCal'];
		$_SESSION['turbine'] = $CheckR;
		$usernew = $_SESSION['username'];

		
		$_SESSION['wind_ratio1'] = $s1;
		$_SESSION['wind_ratio2'] = $s2;
		$_SESSION['elec_cost'] = $ec;
		$_SESSION['supp'] = $supplier;
				
				
	    echo $CheckR;	
				
		 //This for-each loop uses the two wind ratios entered in by the user to loop through each wind speed and perform the calculations on each one.  
	    foreach (range($s1, $s2) as $windratio) 
	    {
             
			 //Calculation 1.3 for turbine power rating
		     $Pw = 1.91*0.5*1.225 * pow($windratio,3);
		
				
				
		     
            echo "<form>";
		     echo "<table>";
			  echo "<hr>";	

	         //Calculation 1 Annual Energy Output
		     $AEO1 = $Pw * $A * $Eff * $UptimeY;
			 $AEO2 = $AEO1 / 1000;
	       
			 
		        echo '<tr><td>AEO - kWh/Yr: </td><td>';
             echo "<input type = 'text' value ='".number_format($AEO2, 2)."'name = 'AEO' disabled='true' />";
			    echo '</td></tr>';
			
		 
		 
		 
		     //Calculation 2 Monthly Energy Output
		     $MEO = $AEO2 / 12;
		  
			
			    echo '<tr><td>MEO - kWh/Month: </td><td>';
             echo "<input type = 'text' value ='".number_format($MEO, 2)."'name = 'MEO' disabled='true' />";
			    echo '</td></tr>';
		 
		 
		     //Calculation 3 Daily Energy Output
		     $DEO = $AEO2 / 365;
		   
			
			    echo '<tr><td>DEO - kWh/Day: </td><td>';
             echo "<input type = 'text' value ='".number_format($DEO, 2)."'name = 'DEO' disabled='true' />";
			    echo '</td></tr>';
		 
		 
		 
		     //Calculation 4 Payback cost
             $PaybackC = $AEO2 * $ec;
         
			
		        echo '<tr><td>Payback Cost - &#8364: </td><td>';
             echo "<input type = 'text' value ='".number_format($PaybackC, 2)."'name = 'cost' disabled='true' />";
			    echo '</td></tr>';
		 

		 
		     //Calculation 5 Payback time;
		     $PaybackT = $Tcost / $PaybackC;
		 
			
			    echo '<tr><td>Payback Time - Years: </td><td>';
             echo "<input type = 'text' value ='".ceil($PaybackT)."'name = 'time' disabled='true' />";
			    echo '</td></tr>';
				
			
			//This stored procedure is inside the for-each loop so it can add each successful calculation to the database as it loops
			//through each one.
		     $userinsert =  ("CALL cal_insert('$usernew','$CheckR','$AEO2', '$MEO',
			 '$DEO', '$PaybackC', '$PaybackT','$s1','$s2','$ec','$supplier')") or die(mysqli_error());
		 
 	         $add_outputs2 = mysqli_query($connection,$userinsert);
				
				
			 echo "</table>";
             echo "</form>"; 
			 echo "<br />";
			 echo "<br />";
			 echo "<br />";
		}//End of for-each loop
		
		if (!$add_outputs2)
            {
             echo "error";
            }
		     else
		    {
              echo "<p><b>Your Outputs have been inserted into your account!</p>
			        <p> To view your outputs, just go to your account page!</b></p>";
            } 
		
		
		$x=serialize($AEO2);
        $y=serialize($PaybackC);
		
mysqli_close($connection);	
}     
?>




<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 

  <table border="0"> 
	 
     <tr><td colspan="2" align="left"> 
	 <input type="button" value="Home Page" onClick="window.location.href='home.php'">
	 </td></tr>

   </table> 

 </form> 
</p>






<div id = "space"></div>

<h2>Graph 1</h2>
	 <p>
<!---This image displays the graph from the linegraph_Template.php file--->	 
<img src="linegraph_Template.php"></img>	 
	  
	 </p>

 <h2>Details</h2>
	 <p>
	 The graph you see here above this paragraph is an example of how the average data values outputed here will behave.
     As the Annual Energy Output(AEO) becomes greater with a better and better wind speed and wind turbine model, the Payback
     cost will also rise. On the other hand, it tells us that if that AEO value were to fall drastically, then our chances of
     getting any payback what so ever, be it costs or an accurate year of payback, would all go down the tubes. Also, if you
     look at the read line, the Payback Cost(PayC), it is beginning to level of. This tells us that there is such a thing as
     Too much wind!!</p>	
	 <p>So the lesson here is keep an eye on the daily wind speed, your wind turbines condition and its energy output, be it yearly,
	 monthly or daily. 	 
	 </p>






</div>
	
	
	
	<div id="sidebar">
		<div id="sbox1">
			<h1>Featured Calculations</h1>
			<br />
			<br />
			<ul class="list-style1">
				<li class="first">
					<h2>Calculation 1</h2>
	 <p>AEO stands for the Annual Energy Output.
	 This will calculate what amount of energy, in kWh, your turbine will
     output in a year. this is based on a specific wind turbine model specification.	 
	 The calculation being used is:</p>
	 <p>AEO = Power * Area * Average turbine efficiency * Time(annual)</p>
					<p><a href="http://www.smallwindtips.com/2010/01/how-to-calculate-wind-power-output/" target=" _blank" class="link-style">Read More</a></p>
				</li>
				<li>
					<h2>Calculation 2</h2>
	 <p>This is the payback time calculation. This calculation
	 calculates the number of years the system will take to cover its costs.
	 If the payback time is longer than the lifetime of the wind turbine,
	 then the system is not viable. The calculation being used here is:</p>
	 <p>PayBack Time = Cost of selected turbine / payback cost.</p>
	 <p>Payback cost = AEO * Cost Per Kwh.</p>
					<p><a href="http://www.smallwindtips.com/2010/01/how-to-calculate-wind-power-output/" target=" _blank" class="link-style">Read More</a></p>
				</li>
				<li>
     <h2>Calculation 3</h2>
	 <p>MEO stands for the Monthly Energy Output.
	 This will calculate what amount of energy, in kWh, your turbine will
     output in a month. this is based on a specific wind turbine model specification.	 
	 The calculation being used is:</p>
	 <p>MEO = Power * Area * Average turbine efficiency * Time(monthly)</p>
                <p><a href="http://www.smallwindtips.com/2010/01/how-to-calculate-wind-power-output/" target=" _blank" class="link-style">Read More</a></p>
				</li>
                <li>
     <h2>Calculation 4</h2>
	 <p>DEO stands for the Daily Energy Output.
	 This will calculate what amount of energy, in kWh, your turbine will
     output in a single day. This is based on a specific wind turbine model specification
	 which is selected by the user.	 
	 The calculation being used is:</p>
	 <p>DEO = Power * Area * Average turbine efficiency * Time(daily)</p>
	 <p>or DEO = AEO / 365</p>
               <p><a href="http://www.smallwindtips.com/2010/01/how-to-calculate-wind-power-output/" target=" _blank" class="link-style">Read More</a></p>
			   </li>	
			</ul>
		</div>
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
