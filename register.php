<?php
include('connect.php');

	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$password2 = mysqli_real_escape_string($conn,$_POST['password2']);


	if($password==$password2){
		$s = mysqli_query($conn, "SELECT * FROM member where email='$email'");
		$r = mysqli_fetch_array($s);
		$s2 = mysqli_query($conn, "SELECT * FROM member where password='$password'");
		$r2 = mysqli_fetch_array($s2);

		if(is_null($r) && is_null($r2)){

			$sql = "INSERT INTO member (id, Name, email, password, phone) VALUES (NULL, '$name', '$email', '$password', '$phone')";

			$s3 = mysqli_query($conn,$sql);
			if($s3){
				echo "<div id='header' style='height:50px;background-color:#ACD6FF;'><h3>Sign up success</h3></div>";
				echo "<meta http-equiv='refresh' content='3; url=index.php'>";
			}
			else{
				echo "<div id='header' style='height:50px;background-color:#ACD6FF;'><h3>Fail to sign up, please try again</h3></div>";
				echo "<meta http-equiv='refresh' content='3; url=signup.php'>";
			}


		}
		else{
			echo "<div id='header' style='height:50px;background-color:#ACD6FF;'><h3>The Email or the password has been signed up, please try another email or password</h3></div>";
			echo "<meta http-equiv='refresh' content='3; url=signup.php'>";
		}
	}
	else{
		echo "<div id='header' style='height:50px;background-color:#ACD6FF;'><h3>The two passwords are not the same, please try again</h3></div>";
		echo "<meta http-equiv='refresh' content='3; url=signup.php'>";
	}




?>