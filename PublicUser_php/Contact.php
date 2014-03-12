<!---Shane Gibbons / K00097327--->
<!---02/05/2013--->
<!---Wind Turbine Process Analyser--->
<!---Public Contact Page--->



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
	
	
<!---CSS wrapper for the menu--->	
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

<!---CSS wrapper for page and its content--->
<div id="page" class="container">
	<div id="content">
	<div id="onecolumn">
			<p><img src="q.jpg" width="550" height="400" alt="" /></p>
			<h2>Any Questions?</h2>
			<ul>
			<li><label  for="emaildisplay">E-Mail: sustainable.tools@gmail.com</label></li>
			<li><label  for="phonedisplay">Phone No: 061 6456427</label></li>
			<li><label  for="faxdisplay">Fax: 061 0456427</label></li>
		    </ul>
			
	<!---This is the form which the users can use if they want to ask us a question--->		
	<form method="post">
	    <fieldset>
		    <legend>Any Questions??</legend>
		        <p> If you have any questions on renewable energy systems
		            or any topics related to this site, please do not hesitate
                    to contact us.			
		        </p>
		    <ol>
		    <li><label  for="name">Name:</label>
			   <input type="text" name="name" id="name" /> </li>
			
		    <li><label  for="email">Email:&nbsp;</label>
			   <input type="text" name="email" id="email" /> </li>
			
			<textarea name="contestEntry" rows="5"
             cols="60" id="form-entry">Questions here! 
            </textarea>	
		    </ol>	
		<input type="submit" value="Submit" name="submit"/>
	    </fieldset>
    </form>
	
	
<?php
//If the user does ask a question, they will be directed to a thank you page when the question is submitted--->
if(isset($_POST['submit']))
    {

        if (!$_POST['name'] | !$_POST['email'] | !$_POST['contestEntry']) 
		     {

 		     die('You did not complete all of the required fields');

 	         }
          else
        {
		
		 header("Location: thankyou.php"); 

	    }

    }

?>
			
		
			
<div id = "space"></div>			
			
			<p>
               If you want questions answered quickly and our e-mail service is too slow(we will not be offended!), please 
               enter our members forum to ask other members of this site all the questions you want. Make friends and experience our
               community of experienced members!!</p>
    <br>


    </br>
     Enter our forum <a class = "button" href = chatforum.php>Here.</a>
    </p>  
    </div>
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


//this section checks the logged cookies to see if the users are logged in
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
