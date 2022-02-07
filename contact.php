<?php
	session_start();
	require_once'database.php';
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$name	 =$_POST['name'];
		$email	 =$_POST['email'];
		$phone	 =$_POST['phone'];
		$message=$_POST['message'];

		$insert="INSERT INTO contact(name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
		mysqli_query($db, $insert);
		$_SESSION['message']='Your Message Send Successfully!';
		header('location:index.php#contact');
	}
?>