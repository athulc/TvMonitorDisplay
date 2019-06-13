<?php
	session_start();
	session_destroy();
	header('Refresh:1;url=index.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Redirecting...</title>
</head>
<body>

</body>
</html>