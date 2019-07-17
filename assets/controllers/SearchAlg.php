<?php
// NOTE: NEED TO UPDATE TO SHOW USERNAME IN RESULTS, PLUS ABILITY TO ACT ON THE RESULTS PLUS location pref
// define variable
$search=$_POST["search"];
// start session
session_start();
$con= new mysqli ('localhost', 'elgringopapito', 'Howlingmoon18', 'RENTIT_DATABASE');
        // check connection
    if(!$con)
    {echo 'sorry, you are not able to connect to the server right now. Please try again later.';
    }
        //Check selection of database
    if(!mysqli_select_db($con,'RENTIT_DATABASE'))
    {
        echo 'sorry, the database was not able to be selected.Please try again later.';
    }
// search alg start
$sql= ("SELECT ITEM.ITEM_TITLE,ITEM.ITEM_AMOUNT,ITEM.ITEM_DESC,IMAGE.IMAGE_ONE,USER.USER_CODE FROM ITEM INNER JOIN IMAGE ON ITEM.ITEM_ID=IMAGE.ITEM_ID INNER JOIN USER ON ITEM.USER_ID=USER.USER_ID WHERE ITEM.ITEM_TITLE LIKE '%$search%'");


$result=mysqli_query($con,$sql);
$Row = mysqli_fetch_array($result);

while ($row =  $result->fetch_array()) {
    print_r($row['ITEM_TITLE'])."<br>";
    echo $row['ITEM_AMOUNT']."<br>";
    echo $row['ITEM_DESC']."<br>";
    echo $row['IMAGE_ONE']."<br>";
    echo $row['USER_CODE']."<br>";
}


?>
