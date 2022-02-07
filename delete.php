<?php
	session_start();
	require_once'database.php';
	$id=$_GET['delete_id'];
	$select="DELETE FROM users WHERE id=$id";
	if (mysqli_query($db, $select)) {
		$_SESSION['status']='Delete Successfull';
		header('location:users.php');		
	}
?>