<?php
	session_start();
	require_once'database.php';
	$id=$_GET['status_id'];
	$select="SELECT * FROM users WHERE id=$id";
	$quiry =mysqli_query($db, $select);
	$assoc =mysqli_fetch_assoc($quiry);
	if ($assoc['status']==1) {
		$status="UPDATE users SET status=2 WHERE id=$id";
		if (mysqli_query($db, $status)) {
			$_SESSION['status']='Deactive Successfull';
			header('location:users.php');
		}
	}else{
		$status="UPDATE users SET status=1 WHERE id=$id";
		if (mysqli_query($db, $status)) {
			$_SESSION['status']='Active Successfull';
			header('location:users.php');
		}
	}
?>