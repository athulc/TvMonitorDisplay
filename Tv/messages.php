<?php include("backend.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Messages</title>
		<link href="https://fonts.googleapis.com/css?family=Carter+One|Satisfy|Dancing+Script" rel="stylesheet">
		<style type="text/css">
			.artstyle{
				width: 1450px;
				height: 700px;
				margin-left: 150px;
			}
			.heading{
				text-align: center;
				margin-top: 70px;
				font-size: 100px;
				color: #0A79DF;
				font-family: Carter One;
			}
			.nomsg{
				text-align: center;
				margin-top: 250px;
				font-size: 150px;
				font-family: Satisfy;
			}
		</style>
	</head>
<body>
	<h1 class="heading">MESSAGES</h1>
	<article class="artstyle">
		<ul>
			<?php for ($j=0; $j < count($msg) ; $j++) { ?>
				<li style="list-style: none;font-size: <?php echo $fsize[$j]."px;"; ?>;
						font-family: <?php echo $fstyle[$j]; ?>; 
						background-color: <?php echo $bclr[$j]; ?>;
						color: <?php echo $fclr[$j]; ?>;">
					<h1><?php echo $msg[$j]; ?></h1>
				</li>
			<?php } if (empty($msg)) {
			 	echo "<p class='nomsg'>No messages</p>"; }
			?>	
		</ul>
	</article>
</body>
</html>