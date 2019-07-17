
 
<!DOCTYPE html>
<html lang="en">
<title>
    Registration Form
</title>
<head>
    <!--Include css for bars-->
    <link rel="stylesheet" type="text/css" href="bars-style.css">
    
           
</head>
<body style="background-color:#66C0F4;">
    <!--Title-->
	<h1 style=padding-left:40px; align=Left>Rentit</h1>
  
   <form style= padding-top:100px action = "insert.php" method = "post">
   Name: <input type="text" name="FName">
   Username:     <input type="text" name="UserName">  
   Password :   <input type="text" name="PassWord">
   <input type = "submit" value = "Insert">
        </form>
    </div>    
    <!--navigation bar-->
<div class="topnav">
        <input type="text" placeholder="Search..">
        <a href="index.htm">Home</a>
        <a href="about-us.htm">About</a>
        <a href="#contact">Contact</a>
        <a class="active"href="#registration-form">Sign Up</a>
        <a href="login.php">Login</a>
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
</body>
</html>