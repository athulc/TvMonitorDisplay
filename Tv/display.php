<?php include("backend.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<meta http-equiv="refresh" content="<?php echo count($web)*43; ?>;URL=display.php">
	<style type="text/css">
		body, html {
		  height: 100%;
		  margin: 0;
		}

		.bg {
		  /* The image used */
		  background-image: url("backgnd.jpg");

		  /* Full height */
		  height: 100%; 

		  /* Center and scale the image nicely */
		  background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
		}
	</style>
	<script type="text/javascript">
		
		var otherStoryLinksArray = <?php echo json_encode($web); ?>;
		 timeToCloseWindow = 40000;
		
		function work() {
		    if(otherStoryLinksArray.length == 0) return;
		    var url = otherStoryLinksArray.shift();
		    var openWindow = window.open(url);
		    openWindow.scrollBy(0,100);
		    setTimeout(function () {
		        openWindow.close();
		        work();
		    }, timeToCloseWindow);
		}

		work();
			
	</script>	
</head>
<body>
	<div class="bg"></div>
</body>
</html>