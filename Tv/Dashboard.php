<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
body {
  font-family: "Lato", sans-serif;
}


.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

/* Add a black background color to the top navigation */
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  border-bottom: 3px solid red;
}

.topnav a.active {
  border-bottom: 3px solid red;
}

.block{
	border: 1px solid black;
	height: 500px;
	width: 370px;
	display: inline-block;
	margin-top: 100px;
	background-color: #DAE0E2;
}

.talign{
	margin-left: 110px;
	font-size: 30px;
}

p {
	padding: 10px;
	font-size: 20px;
}
.zoom {
  transition: transform .2s;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
</style>
</head>
<body>
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="Dashboard.php">Dashboard</a>
	  <a href="Insert.php">Webpages</a>
	  <a href="Message_insert.php">Messages</a>
	  <a href="Image_upload.php">Images</a>
	</div>

	<div id="main" style="border: 1px solid black;padding: 5px;background-color: #3498DB;">
		<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
		<span style="margin-left: 700px;color: white;font-size: 30px;">Admin Page</span>
		<a href="log_out.php" style="margin-left: -850px;"><span class="btn btn-default">Logout</span></a>
	</div>
	<span>
		<img src="header.png" width="115" style="margin-left: 1640px;margin-top: -80px;">
		<a href="help_document.pdf" class="glyphicon glyphicon glyphicon-question-sign zoom" style="color:black;font-size: 30px;margin-left: 1700px;text-decoration: none;" data-toggle="tooltip" data-placement="left" title="Click for the help!"></a>
	</span>
	<div class="container">
		<div class="block">
			<span class="talign"><u>Webpages</u></span>
			<p>A webpage is a section where admin can insert as many number of webpages to the table.The admin has to type the exact path of the webpage.</p>
			<p>The admin can see the order,status and also admin can do all the CRUD operations.Proper validation is given at every stage.</p>
		</div>
		<div class="block">
			<span class="talign"><u>Messages</u></span>
			<p>A message section has many features.The following are some of the tasks done by admin,<br>
				1. Font family<br>
				2. Font size<br>
				3. Forecolor<br>
				4. Background color<br>
				5. Status<br>
				6. Order<br>
			</p>
		</div>
		<div class="block">
			<span class="talign"><u>Images</u></span>
			<p>The image section can be used to upload an image.The uploaded images will be showed on the display screen.There are two options View & Upload.The view shows active and non-active images from the list.</p>
			<p>The active images are marked as right rest all are marked as cross.</p>	
		</div>
	</div>
	<script>

		/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
		function openNav() {
		  document.getElementById("mySidenav").style.width = "250px";
		  document.getElementById("main").style.marginLeft = "250px";
		  document.getElementById("foot").style.marginLeft = "250px";
		}

		/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
		function closeNav() {
		  document.getElementById("mySidenav").style.width = "0";
		  document.getElementById("main").style.marginLeft = "0";
		  document.getElementById("foot").style.marginLeft = "0";
		}

	</script>
	<script type="text/javascript">
		$(document).ready(function(){
  			$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
	<footer style="background-color: #2475B0;height: 60px;margin-top: 100px;" id="foot">
		<span style="color: white;">* Type 'localhost/Tv/display.php' in the new tab and enter to start the display screen.<br>* Click the top right question mark symbol for help.</span>
	</footer>
</body>
</html>