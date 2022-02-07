<?php
	session_start();
	require_once'database.php';
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$name	 =$_POST['name'];
		$email	 =$_POST['email'];
		$phone	 =$_POST['phone'];
		$password=$_POST['password'];

		if (empty(!$name)) {
			$len=strlen($name);
			if ($len>=5) {
				$_SESSION['name']=$name;
				$validname=$name;
			}else{
				$_SESSION['invalidname']='Must Be Name of at least five characters!';
				header('location:register.php');
			}
		}else{
			$_SESSION['invalidname']='Please Inter Your Name';
			header('location:register.php');
		}

		if (empty(!$phone)) {
			$_SESSION['phone']=$phone;
			$validphone=$phone;
		}else{
			$_SESSION['invalidphone']='Please Inter Your Phone';
			header('location:register.php');
		}


		if (!empty($email)) {
			$regex='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
			if (preg_match($regex, $email)) {
				$_SESSION['email']=$email;
				$validemail=$email;
				$select="SELECT COUNT(*) AS total from users WHERE email='$email'";
				$quiry=mysqli_query($db, $select);
				$assoc=mysqli_fetch_assoc($quiry);
				if ($assoc['total']>0) {
					$_SESSION['invalidemail']='Email Alrady Exists!';
					header('location:register.php');
				}
			}else{
				$_SESSION['invalidemail']='Please Inter Your Valid Email';
				header('location:register.php');
			}
		}else{
			$_SESSION['invalidemail']='Please Inter Your Email';
			header('location:register.php');
		}

		if (empty(!$password)) {
			$len=strlen($password);
			if ($len>=8) {				
				$number = preg_match('@[0-9]@', $password);
				$uppercase = preg_match('@[A-Z]@', $password);
				$lowercase = preg_match('@[a-z]@', $password);
				$specialChars = preg_match('@[^\w]@', $password);
				if ($number && $uppercase && $lowercase && $specialChars) {
					$validpassword=password_hash($password, PASSWORD_DEFAULT);
				}else{
					$_SESSION['invalidpassword']='Your Password is weak! Please Use Strong Password';
					header('location:register.php');
				}				
			}else{
				$_SESSION['invalidpassword']='Type an eight-digit password!';
				header('location:register.php');
			}
		}else{
			$_SESSION['invalidpassword']='Use a strong password and submit form';
			header('location:register.php');
		}

		if ($validname && $validemail && $validphone && $validpassword) {
			$insert="INSERT INTO users(name, email, phone, password) VALUES ('$validname', '$validemail', '$validphone', '$validpassword')";
			mysqli_query($db, $insert);
			$_SESSION['input']='You have successfully completed the registration';
			header('location:register.php');
		}else{
			$_SESSION['input']='If there is a problem, try again';
			header('location:register.php');
		}

	}else{
		$_SESSION['input']='If you have not registered, complete the registration first and try later';
		header('location:register.php');		
	}
?>