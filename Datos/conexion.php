<?php
	$server="localhost";
	$username="root";
	$password="";
	$db='exprela';
	
	$mysqli = mysqli_connect($server, $username, $password, $db);
	if (!$mysqli){
		die("no se ha podido establecer la conexión");
	}
	mysqli_select_db($mysqli,$db);
?>