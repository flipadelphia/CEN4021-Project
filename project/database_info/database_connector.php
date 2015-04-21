<?php
	$host="localhost";
	$user="root";
	$password="";
	$dbName="kanji";
	
	$con=mysqli_connect($host,$user,$password,$dbName);
//	mysqli_query($con,"SET NAMES 'utf8'");
	
	if(!$con)
		echo "Could not connect to database";
?>
