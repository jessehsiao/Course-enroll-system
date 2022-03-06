<?php
session_start();
$id = $_SESSION["id"];

include('connect.php');


	$Cid = mysqli_real_escape_string($conn,$_POST['courseID']);


	$s = mysqli_query($conn,"DELETE FROM membercourse WHERE mID='$id' and cID='$Cid'");

	if($s)
	{
		echo "<div id='header' style='height:50px;background-color:#ACD6FF;'><h3>Drop success</h3></div>";
		echo "<meta http-equiv='refresh' content='2; url=enrollment.php'>";
	}
	else{
		echo "<div id='header' style='height:50px;background-color:#ACD6FF;'><h3>fail to drop, please try it again</h3></div>";
		echo "<meta http-equiv='refresh' content='2; url=enrollment.php'>";
	}

?>