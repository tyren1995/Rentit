    <?php
    // This file obtains information for items from an html form, and then inserts this information into a sql database, including transforming and insterting
    
        //start session
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
        //declare and initialize posted variables
    $title = $_POST ["title"];
    $price = $_POST ["amount"];
    $desc = $_POST ["desc"];
    $cat = $_POST ["category"];
    $id= $_SESSION ["id"];
    
    
        //declare image file paths
    $i1 =  ($_FILES["imageone"]['tmp_name']);
    $a1=   file_get_contents($i1)  ;
    $a2=bin2hex($a1);
    $i2 = ($_FILES["imagetwo"]['tmp_name']);
    $b1=   file_get_contents($i2)  ;
    $b2=bin2hex($b1);
    $i3 = ($_FILES["imagethree"]['tmp_name']);
    $c1=   file_get_contents($i3)  ;
    $c2=bin2hex($c1);
    $i4 = ($_FILES["imagefour"]['tmp_name']);
    $d1=   file_get_contents($i4)  ;
    $d2=bin2hex($d1);
    
    
    

    
        //item insert query
    $sql= "INSERT INTO ITEM (ITEM_TITLE,ITEM_AMOUNT,ITEM_DESC,USER_ID,CATEGORY_ID) VALUES ('$title','$price','$desc','$id','$cat')";
   
    if (!mysqli_query($con,$sql))
    {
        echo 'not inserted';

    }
        else
        {
    echo 'inserted';
        }
        
        // get item_id from correct item listing
    $sql= "SELECT ITEM_ID FROM ITEM WHERE ITEM_TITLE=('$title') AND ITEM_AMOUNT=('$price') AND ITEM_DESC=('$desc') AND USER_ID=('$id') AND CATEGORY_ID=('$cat')";
    $result=mysqli_query($con,$sql);
  
        // create variable for item_id result
  $row=mysqli_fetch_row($result);
        // Convert variable to int type
  $introw= $row[0] +0;
        // image insert query
    $sql= "INSERT INTO IMAGE (ITEM_ID,IMAGE_ONE,IMAGE_TWO,IMAGE_THREE,IMAGE_FOUR) VALUES ('$introw','$a2','$b2','$c2','$d2')";
   
    
    if (!mysqli_query($con,$sql))
    {
        echo 'not inserted';
        echo("Error description: " . mysqli_error($con));
    }
        else
        {
    echo 'inserted';
         }
        ?>