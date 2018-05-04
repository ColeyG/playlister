<?php
	$user = "root";
	$pass = "root";
	$url = "localhost";
    $db = "playlister";
    $port = 3306;
	
	$link = mysqli_connect($url, $user, $pass, $db, $port);
	 	
	if(mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>