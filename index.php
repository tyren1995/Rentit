<!--This is the html,css, and javascript for the website version of Rentit, the new user hub for rentors and rentees international.-->
<html>
<head>
	<!--Include css for bars-->
	<link rel="stylesheet" type="text/css" href="bars-style.css">


<!--Change the switch icons for images-->
<style>
		.mySlides {display:none;}
		</style>
		

</head>
<title>Rentit home Page</title>
<!--Background color-->
	<body style="background-color:#66C0F4;">
<!--Title-->
	<h1 style=padding-left:40px; align=Left>Rentit</h1>
	<h2 align=Left>"The World is Yours."</h2>

	<div class="topnav">
		<form action="SearchAlg.php" method="post" >
		<input type="text" placeholder="Search.." name="search">
		</form>
		<a class="active" href="#home">Home</a>
		<a href="about-us.htm">About</a>
		<a href="#contact">Contact</a>
		<a href="registration-form.htm">Sign Up</a>
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
	

	
<!--Images-->
<div class="display-containers">
		<img class="mySlides" src="img_3.jpeg" width="1000" height="500" style=margin-left:130px; >
		<img class="mySlides" src="img_2.jpg"width="1000" height="500" style=margin-left:130px;>
		<img class="mySlides" src="img_1.jpg"width="1000" height="500" style=margin-left:130px;>
<!--Image Buttons-->

		<button class="button black display-left" onclick="plusDivs(-1)">&#10094;</button>
		<button class="button black display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

<!--pictures script-->
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  x[slideIndex-1].style.display = "block"; 
}
</script>
</body>
</html>