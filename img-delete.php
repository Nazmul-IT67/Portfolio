<?php
	session_start();
	require_once'database.php';
	$id=$_GET['delete_id'];
	$select="DELETE FROM image WHERE id=$id";
	if (mysqli_query($db, $select)) {
		$_SESSION['delete']='Delete Successfull!';
		header('location:gallery.php');
	}
?>