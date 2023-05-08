<?php
	session_start();
	include('connection.php');
 	$errors = array();

	if (isset($_POST['btnsignup'])){
		$Username = mysqli_real_escape_string($conn, $_POST['username']);
		$Email = mysqli_real_escape_string($conn, $_POST['email']);
		$Password1 = mysqli_real_escape_string($conn, $_POST['pwd']);
		$Password2 = mysqli_real_escape_string($conn, $_POST['pwd2']);
		$user_check_query = "SELECT * FROM user WHERE  username = '$Username' OR u_mail = '$Email' ";
		$query = mysqli_query($conn, $user_check_query);
		$result = mysqli_fetch_assoc($query);

		if ($result){
			if ($result['username'] === $Username){
				array_push($errors, "ชื่อบัญชีผู้ใช้ไม่สามารถใช้ได้");
			}
			if ($result['u_mail'] === $Email){
				array_push($errors, "อีเมลนี้ไม่สามารถใช้ได้");
			}
		}

		if (count($errors) == 0){
			$Password = md5($Password1);
			$sql = "INSERT INTO user (username, u_mail, password) 
			VALUES ('$Username', '$Email', '$Password')";
			mysqli_query($conn, $sql);

			$_SESSION['username'] = $Username;
			$_SESSION['u_status'] = "S";
			header('location: user_index.php');
		} 
		else {
			array_push($errors, "ชื่อบัญชีผู้ใช้หรืออีเมลไม่ถูกต้องกรุณากรอกใหม่อีกครั้ง");
			$_SESSION['error'] = "ไม่สามารถใช้ ชื่อบัญชี หรือ อีเมลนี้ได้ ";
			header("location: form_signup.php");
            
		}
	}
	
?>