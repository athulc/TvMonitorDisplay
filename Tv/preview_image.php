<?php 
	
	$img = $_GET['img'];
	$dir = 'Images/'.$img;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Preview</title>
	<style type="text/css">
		body, html {
		  height: 100%;
		}

		.fixed-background {
          position: absolute;
          top: 0;
          left: 0;
          height: 100%;
          width: 100%;
          background-image: url(<?php echo $dir; ?>);
          background-position: center;
		  background-repeat: no-repeat;
		  background-size: cover;
          overflow: hidden;
      }
	</style>
</head>
<body>
	<div class="fixed-background"></div>
</body>
</html>