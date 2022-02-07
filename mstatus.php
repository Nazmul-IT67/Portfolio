<?php
	session_start();
	require_once'database.php';
	$id=$_GET['status_id'];
	$select="SELECT * FROM contact WHERE id=$id";
	$quiry =mysqli_query($db, $select);
	$assoc =mysqli_fetch_assoc($quiry);
	if ($assoc['status']==1) {
		$status="UPDATE contact SET status=2 WHERE id=$id";
		if (mysqli_query($db, $status)) {
			$_SESSION['status']='Unred Successfull';
			header('location:message.php');
		}
	}else{
		$status="UPDATE contact SET status=1 WHERE id=$id";
		if (mysqli_query($db, $status)) {
			$_SESSION['status']='Red Successfull';
			header('location:message.php');
		}
	}
?>