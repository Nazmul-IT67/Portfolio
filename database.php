<?php
	define('HOST', 'localhost');
	define('USERS', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'portfolio');
	$db=mysqli_connect(HOST, USERS, PASSWORD, DATABASE);
	if ($db) {
		// echo'Connect Successfull';
	}else{
		echo'Conection Error';
	}
?>