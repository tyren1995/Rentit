<?php

 
// Attempt to connect to MySQL database //
$mysqli = new mysqli("localhost", "elgringopapito", "Howlingmoon18", "RENTIT_DATABASE");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
echo "Connected successfully";
?>