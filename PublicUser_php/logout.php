<!---Shane Gibbons / K00097327--->
<!---02/05/2013--->
<!---Wind Turbine Process Analyser--->
<!---Public Logout Page--->



<!---The following code logs the user out by destroying all the sessions and killing the cookies--->
<?php 
//Start a session
session_start();

//Delete ALL session variables
session_destroy();
?>


<p>
A session has joined and the session has been destroyed
<p>
<?php

if(isset($_SESSION['views']))
{    
echo "Pageviews = ". $_SESSION['views']; //retrieve data
}
else
{
echo "No Session variable";
}

?>
</p>
<?php
 $past = time() - 100; 

 //this makes the time in the past to destroy the cookie 

 setcookie(ID_user, gone, $past); 
 setcookie(Key_user, gone, $past); 
 

 header("Location: index2.php"); 
 
 mysqli_close($connection);

?> 
 
</body>
</html>