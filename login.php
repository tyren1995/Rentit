<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.htm");
    exit;
}
 
// Include connect (db) file
include_once 'connect.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT USER_ID, USER_CODE , USER_PASSWORD FROM USER WHERE USER_CODE = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                //creating row data to get user_id
            
               
                
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;    
                                   
                            
                            // Redirect user to welcome page
                            header("location: index.htm");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
          
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Include css for bars-->
    <link rel="stylesheet" type="text/css" href="bars-style.css">
    
    <meta charset="UTF-8">
    <title>Login</title>
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body style="background-color:#66C0F4;">
<!--Title-->
<h1 style=padding-left:40px; align=Left>Rentit</h1>
<!--navigation bar-->
<div class="topnav">
    <input type="text" placeholder="Search..">
    <a href="index.htm">Home</a>
    <a href="about-us.htm">About</a>
    <a href="#contact">Contact</a>
    <a href="registration-form.htm">Sign Up</a>
    <a class="active"href="#login">Login</a>
    <a href="item-creation-form.htm">New Item</a>
</div>
<!--Sidebar HTML Links-->
<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="r-autos.htm">Automobiles and Vehicles</a>
    <a href="r-appliances.htm">Appliances</a>
    <a href="r-clothing.htm">Clothing and Accessories</a>
    <a href="r-furniture.htm">Furniture</a>
    <a href="r-gamesetc.htm">Games and Movies</a>
    <a href="r-hobbies.htm">Hobbies</a>
    <a href="r-housing.htm">Houses,Rooms,and Apartments</a>
    <a href="r-instruments.htm">Instruments</a>
    <a href="r-other.htm">Other</a>
    <a href="r-outdoors.htm">Outdoors</a>
    <a href="r-services.htm">Services</a>
    <a href="r-tools.htm">Tools</a>
    
    

</div>
<!--Click Button HTML sidebar-->
<div id="main">
    <button class="openbtn" onclick="openNav()">&#9776;</button>
    
</div>
<script>
    function openNav() {
        document.getElementById("mySidebar").style.width="250px";
        document.getElementByID("main").style.marginLeft="250px";
    }
    function closeNav() {
        document.getElementById("mySidebar").style.width = "0"
        document.getElementById("main").style.marginLeft="0";
    }
</script>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>