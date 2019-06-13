<!DOCTYPE html>
<html>
<head>
	<title>Bday</title>
	<link href="https://fonts.googleapis.com/css?family=Barrio|Vast+Shadow" rel="stylesheet">
	<style type="text/css">
		body, html {
		  height: 100%;
		  margin: 0;
		}
		.divstyle{
			overflow: hidden;
			text-align: center;
			width: 1000px;
			height: 1000px;
			margin-left: 750px;
				
		}
		.hstyle{
			font-size: 150px;
			font-family: 'Barrio', cursive;
			margin-top: 100px;
			color: #3498DB;

		}
		.bg {
		  /* The image used */
		  background-image: url("bday.jpg");

		  /* Full height */
		  height: 100%; 

		  /* Center and scale the image nicely */
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
		}
	</style>
</head>
<body>
	<?php include("backend.php"); ?>
	<div class="bg">
		<div class="divstyle">
			<h1 class="hstyle">Happy Birthday
			<?php
				for ($i=0; $i < count($bday) ; $i++) { 
					echo $bday[$i]." ";
					if (count($bday) < 2) {
						if ($i == count($bday) - 1) {
							echo " ";
						}else{
							echo "& ";
						}
					}else {
						if ($i == count($bday) - 2) {
							echo "& ";
						}else if($i == count($bday) - 1){
							echo " ";
						}else{
							echo ",";
						}
					}
				}	
			?>
			</h1>
		</div>
	</div>
</body>
</html>