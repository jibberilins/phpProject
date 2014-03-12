<?php
 
include("MySQLAdmin_open_connection.php");
        $AEO2 = $_SESSION['aeo'];
		$MEO = $_SESSION['meo'];
		$DEO = $_SESSION['deo'];
		$PaybackC = $_SESSION['payc'];
	    $PaybackT = $_SESSION['payt'];	 

     $Admininsert =  ("CALL cal_insert('$AEO2', '$MEO', '$DEO', '$PaybackC', '$PaybackT')") or die(mysqli_error());
		 
 	    $add_outputs = mysqli_query($connection,$Admininsert);

        if (!$add_outputs)
        {
           echo "error";
        }
		else
		    {
              echo "Your Outputs have been inserted!";
            }
			
mysqli_close($connection);			
?>