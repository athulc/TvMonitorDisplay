<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "jda2";

	$conn = mysqli_connect($server,$user,$pass,$dbname);

	if (!$conn) {
		die("Connection failed!".mysqli_connect_error());
	}
?>