<?php
// Attempt to connect to MySQL database //
$con = new mysqli ('localhost', 'elgringopapito', 'Howlingmoon18', 'RENTIT_DATABASE');
// Check connection
if(!$con)
{
    echo 'not connected to server';
}
if(!mysqli_select_db($con,'RENTIT_DATABASE'))
{
    echo 'Database not selected.';
} 
$FName = $_POST ['FName'];
$UserName = $_POST ['UserName'];
$PassWord = $_POST ['PassWord'];
$hashed_password = password_hash($PassWord, PASSWORD_DEFAULT);

$sql = "INSERT INTO USER (USER_FNAME,USER_CODE,USER_PASSWORD) VALUES ('$FName','$UserName','$hashed_password')";

if (!mysqli_query($con,$sql))
{
    echo 'not inserted';
}
    else
    {
echo 'inserted';
    }

?> 