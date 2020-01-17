<?php
 
 
function Connect()
{
$dbhost = "localhost";
 $dbuser = "trueword_user";
 $dbpass = "opeyemioluwa0316";
 $dbname = "trueword_db";
 
 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 


     return $conn;
}
?>
