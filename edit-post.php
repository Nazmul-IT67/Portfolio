<?php
	session_start();
	require_once'database.php';
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$name	 =$_POST['name'];
		$email	 =$_POST['email'];
		$phone	 =$_POST['phone'];
		$id 	 =$_POST['user_id'];

		if (empty(!$name)) {
			$len=strlen($name);
			if ($len>=5) {
				$_SESSION['name']=$name;
				$validname=$name;
			}else{
				$_SESSION['invalidname']='Must Be Name of at least five characters!';
				header('location:edit.php');
			}
		}else{
			$_SESSION['invalidname']='Please Inter Your Name';
			header('location:edit.php');
		}

		if (empty(!$phone)) {
			$_SESSION['phone']=$phone;
			$validphone=$phone;
		}else{
			$_SESSION['invalidphone']='Please Inter Your Phone';
			header('location:edit.php');
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
					header('location:edit.php');
				}
			}else{
				$_SESSION['invalidemail']='Please Inter Your Valid Email';
				header('location:edit.php');
			}
		}else{
			$_SESSION['invalidemail']='Please Inter Your Email';
			header('location:edit.php');
		}


		if ($validname && $validemail && $validphone) {
			$insert="UPDATE users SET name='$validname', email='$validemail', phone='$validphone' WHERE id=$id";
			mysqli_query($db, $insert);
			$_SESSION['status']='You have successfully completed Update';
			header('location:users.php');
		}
	}
?>