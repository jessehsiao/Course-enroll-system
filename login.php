<?php
session_start();
include('connect.php');


	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);


	$s = mysqli_query($conn, "SELECT * FROM member WHERE email='$email' and password='$password'");
	$r = mysqli_fetch_array($s);

	if($r)
	{
		$_SESSION['Name']=$r['Name'];
		$_SESSION['email']=$r['email'];
		$_SESSION['id']=$r['id'];

		echo "<div id='header' style='height:50px;background-color:#ACD6FF;'><h3>login success</h3></div>";
		echo "<meta http-equiv='refresh' content='2; url=enrollment.php'>";
	}
	else{
		echo "<div id='header' style='height:50px;background-color:#ACD6FF;'><h3>Your email or password is wrong, please try it again</h3></div>";
		echo "<meta http-equiv='refresh' content='2; url=index.php'>";
	}

?>
