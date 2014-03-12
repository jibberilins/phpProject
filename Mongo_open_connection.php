<?php
//make the connection
$connection_mongo = new Mongo();


$db = $connection_mongo->select_db('renewabledb') or die( "Unable to select database - named:  ".$dbname);
//$connection->close();
?>
