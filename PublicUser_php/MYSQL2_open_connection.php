<!---Shane Gibbons / K00097327--->
<!---02/05/2013--->
<!---Wind Turbine Process Analyser--->
<!---Public user connection file--->



<?php
//Set connection parameters for public user
$dbhost = "localhost";
$dbuser = "publicuser";
$dbpass = "public";
$dbname = "renewable_login";



//make the connection using the parameters above
$connection=new mysqli($dbhost,$dbuser,$dbpass,$dbname); 


//if the connection fails, display a mysqli connection error
if ($connection->connect_errno) 
{
   die(mysqli_connect_error()); 
}



//select the database
//if database dows not exist an error message is displayed
$connection->select_db($dbname) or die( "Unable to select database - named:  ".$dbname);
//mysqli_close($connection);

?>
