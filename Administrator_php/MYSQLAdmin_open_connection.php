<!---Shane Gibbons / K00097327--->
<!---02/05/2013--->
<!---Wind Turbine Process Analyser--->
<!---Admin user connection file--->


<?php
//Set connection parameters
$dbhost = "localhost";
$dbuser = "AdminUser";
$dbpass = "Admin1";
$dbname = "renewable_login";

//make the connection
$connection=new mysqli($dbhost,$dbuser,$dbpass,$dbname); 

if ($connection->connect_errno) 
{
   die(mysqli_connect_error()); 
}


//select the database
//if database dows not exist an error message is displayed
//

mysqli_select_db($connection, $dbname) or die( "Unable to select database - named:  ".$dbname);
//mysqli_close($connection);
//$connection->close();
?>
