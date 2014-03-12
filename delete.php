<?php
//Start a session
session_start();
?>

<?php

include("MySQLAdmin_open_connection.php");


if(!isset($_POST['userdelete']))
{
die('ERROR2');
}
else
{

	
	    $userdelete = $_SESSION['delete_id'];
	 

     $Dresult = mysqli_query($connection,"call delete_user('$userdelete')");
	 
	 
	 if ($Dresult)
	    {
		 echo "Affected rows (DELETE): \n". mysqli_affected_rows($connection);
         echo "User deletion successful!";
		 
	    }
	      else
						{
						
						  die( mysqli_error());
						 
                        }
 
}
mysqli_close($connection);
?>