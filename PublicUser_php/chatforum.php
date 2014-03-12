<!---Shane Gibbons / K00097327--->
<!---02/05/2013--->
<!---Wind Turbine Process Analyser--->
<!---Public chatforum Page--->


<?php
//Start a session
session_start();
?>


<!---The chatforum section was done in mysql instead of mysqli. This was simply because it failed to work in mysqli!!--->
<?php

//Connect to the database
if(isset($_POST['Submit']))   //Check if message submitted
{   
$dbhost = "localhost";
$dbuser = "publicuser";
$dbpass = "public";
$dbname = "renewable_login";

    //make the connection
    $connection = mysql_connect($dbhost, $dbuser, $dbpass) or die("Error connecting to MySQL!!");
	mysql_select_db($dbname, $connection) or die("Unable to select DB!");

	
	
//layout the message parameters using the session of the user logged in and the names of the form fields in the forum	
	//Get the values from the form
	$message = $_POST['msg'];
	
	//If the username is not set then set it based on form input
	if(!$_SESSION['username']){
	$sender = $_POST['from'];
	$_SESSION['username']=$sender;
	}
	else{
	$sender=$_SESSION['username'];
    }
	
	
	//Get the values from the form if entered
	$message = $_POST['msg'];
	$sender = $_POST['from'];
	
	//Set up and execute the INSERT query
	$query = ("CALL insertmessage('$message','$sender')") or die(mysql_error());
	$add_member = mysql_query($query);	
	

}
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
     


<!---This is the javasrcipt and ajax code which controls the messaging system---> 
<script type="text/javascript">
       //Set up some variables to be used by the timer
       var c=0;
       var t;
       var timer_is_on=0;  //timer status 0=off 1=on

	   
	   
	   
           //Timer functions
           function timedCount()
    {
           loadXMLDoc(); //each time this function is called the dynamic content is updated
           c=c+1;
		   
           if (timer_is_on)
	    {
	       t=setTimeout("timedCount()",1000);  //Sets the interval of the timer
	    }
    }
	
	
	
	
	
	
               function doTimer() //Start timer 
	    { 
               if (!timer_is_on)
            {
               timer_is_on=1;
               timedCount();
            }
        }
               function stopTimer() //Stop timer
	        {
			   timer_is_on=0;
            }

			
			
			
                    function loadXMLDoc()
	{
                    //Set up some variables
                    // req: handle for the request object
                    var req;

                    // urlToFetch: URL of the dynamic content 
                    // Note the randNum variable being added to make the request unique
                    // this is required to overcome caching at the browser
                    var urlToFetch = 'http://localhost:8080/DDA/proj/message.php?randNum=' + new Date().getTime();

                    //Create the appropriate request object for the browser being used: 
                    if (window.XMLHttpRequest)  //The XMLHttpRequest property is available on the window object.  
                {
                    req=new XMLHttpRequest();   // code for IE7+, Firefox, Chrome, Opera, Safari
                }
                    else
                {
                    req=new ActiveXObject("Msxml2.XMLHTTP");  // code for IE6, IE5
                }
 
 
                    req.onreadystatechange=function()  
            {
                    if (req.readyState==4 && req.status==200)
                {
	                //document.getElementById("myContent").innerHTML='urlToFetch:='+urlToFetch+'<p>'+req.responseText;
	
	                document.getElementById("myContent").innerHTML=req.responseText;
                }
            }
			
        req.open("GET",urlToFetch,true);  //open(): Assigns method, destination URL, and other optional attributes of a pending request.
        req.send(); //Sends an HTTP request to the server and receives a response.

        //The following notes will help to understand the code
        //
        //Note:onreadystatechange: 
        //		Sets or retrieves the event handler for asynchronous requests.
        //
        //
        //
        //Note :req.readyState
        // 		Is an integer that receives one of the following values:
        // 0:   The object has been created, but not initialized (the open method 
        //      has not been called).
        // 1:   A request has been opened, but the send method has not been called. 
        // 2:   The send method has been called. No data is available yet. 
        // 3:   Some data has been received; however, neither responseText 
        //      nor responseBody is available. 
        // 4:    All the data has been received. 
        //
        // Note :req.status
        // 200: "OK"
        // 404: Page not found
        //
        // When readyState=4 and status=200 the response is ready
    }

</script>




</head>

<body onload="doTimer()">
<div id="header" class="container">
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
<h2>AJAX Real Time Messaging System</h2>
<h3>Enter Message</h3>


<!---The form below is the form which allows the user to enter a message along with their name--->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<br />
	<textarea name="msg" class="code_input" rows="3" cols="55" wrap="logical"></textarea><br />
	
	From:<input name="from" type="text"   size="30" maxlength="30" />	
	
	<input name="Submit" type="submit" value="Send Message" />
</form>



<!---The div id "myContent" below initiates the javascript and ajax code which allows for the messages to appear dynamically-->
<hr>
<div id="myContent" >Dynamic content will appear here</div>
<hr>
<a href = home.php>Home</a>
</div>
</div>


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
