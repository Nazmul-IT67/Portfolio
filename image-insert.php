<?php
	require_once'database.php';
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$name   =$_POST['name'];
		$image  =$_FILES['image'];
		$explode=explode('.', $image['name']);
		$end    =end($explode);
		$allow  =array('jpg','jpeg','png');
		if (in_array($end, $allow)) {
			$insert="INSERT INTO image(name) VALUES ('$name')";
			$quiry =mysqli_query($db, $insert);
			$lastid=mysqli_insert_id($db);
			$name  =$name .'.'. $lastid .'.'.$end;
			$locat ='gallery/image/'.$name;
			move_uploaded_file($image['tmp_name'],$locat);
			$update="UPDATE image SET gallery='$name' WHERE id='$lastid' ";
			if (mysqli_query($db, $update)) {
				header('location:gallery.php');
			}else{
				echo'error';
			}
		}else{
			echo'Not allow';
		}
	}
?>