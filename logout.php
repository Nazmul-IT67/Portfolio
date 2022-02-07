<?php
	require_once'sessation.php';
	session_destroy();
	header('location:login.php');
?>