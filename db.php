<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = "workedup";

$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("workedup", $conn);
?>	
