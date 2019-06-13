<?php

	include("db.php");

	$username = $_POST['username'];
	$userpass = $_POST['password'];

	$username = stripcslashes($username);
	$userpass = stripcslashes($userpass);
	$username = mysql_real_escape_string($username);
	$userpass = mysql_real_escape_string($userpass);

	$sql = "SELECT * FROM tadmin WHERE uname = '$username' AND upass = '$userpass';";
	$res = mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($res);

	if ($row['uname'] == $username && $row['upass'] == $userpass) {
		echo "<h2>Login success!!!. Welcome ".$row['uname'].",Redirecting...</h2>";
		header("Refresh: 3;URL=Dashboard.php");
	}else{
		echo "<h2>Failed to login!Please try again </h2>";
		header("Refresh: 3;URL=index.php");
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Redirecting...</title>
</head>
<body>

</body>
</html>