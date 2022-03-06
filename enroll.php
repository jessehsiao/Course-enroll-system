<?php
session_start();
$id = $_SESSION["id"];

include('connect.php');


	$Cid = mysqli_real_escape_string($conn,$_POST['courseID']);


	$sql = "INSERT INTO membercourse (num, mID, cID) VALUES (NULL, '$id', '$Cid')";
	$s3 = mysqli_query($conn,$sql);

	if($s3)
	{
		echo "<div id='header' style='height:50px;background-color:#ACD6FF;'><h3>Enroll success</h3></div>";
		echo "<meta http-equiv='refresh' content='2; url=enrollment.php'>";
	}
	else{
		echo "<div id='header' style='height:50px;background-color:#ACD6FF;'><h3>fail to enroll, please try it again</h3></div>";
		echo "<meta http-equiv='refresh' content='2; url=enrollment.php'>";
	}

?>