<!---Shane Gibbons / K00097327--->
<!---02/05/2013--->
<!---Wind Turbine Process Analyser--->
<!---Message file for Chatforum--->



<?php
//make the connection
$dbhost = "localhost";
$dbuser = "publicuser";
$dbpass = "public";
$dbname = "renewable_login";


$conn=mysql_connect($dbhost,$dbuser,$dbpass); 
if (!$conn) 
	{
	die("<h2><font color=#FF0000><blink>Error! :</blink></font>".mysql_error()."</h2>");
	}
    @mysql_select_db($dbname) or die( "Unable to select database - named:  ".$dbname);

	
//Execute SQL
$query = mysql_query("call selectmessages()") or die( mysql_error()); 
$num=mysql_numrows($query);  //The number of rows returned by the query


/*
Output Message table content. This outputs last message first
and is limited to the last $n messages.
*/
$i=$num;
$n=$num-5;  //show only ten most recent messages
while ($i > $n) 
	{
	$i--;
	echo "<p>";
	echo '<b>'.mysql_result($query,$i,2).':</b>';
	echo '<i> '.mysql_result($query,$i,1).'</i>';
	echo "</table>";
	}



?>
