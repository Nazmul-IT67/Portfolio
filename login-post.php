<?php
	session_start();
	require_once'database.php';
	if ($_SERVER['REQUEST_METHOD']=='POST') {
	$email	 =$_POST['email'];
	$password=$_POST['password'];

	$select="SELECT COUNT(*) AS total, email, password from users WHERE email='$email'";
	$quiry =mysqli_query($db, $select);
	$assoc =mysqli_fetch_assoc($quiry);
	if ($assoc['total']>0) {
		$hash=$assoc['password'];
		if (password_verify($password, $hash)) {
			$_SESSION['email']=$assoc['email'];
			header('location:dashboard.php');
		}else{
			$_SESSION['login']='Password Not Match';
			header('location:login.php');
		}
	}else{
		$_SESSION['login']='Email Not Match';
		header('location:login.php');
	}
} 	
?>