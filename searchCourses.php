<?php
session_start();
include('connect.php');

$id = $_SESSION["id"];
$name=$_SESSION['Name'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Harvard University Course Enrollment System</title>
   <link rel="shortcut icon" type="image/x-icon" href="assets/img/harvard2.png">
   <link rel="stylesheet" type="text/css" href="style1.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="header" style="text-align:center">
		<img src="assets/img/harvard.png" height="150px">
		<h3 style="color: blue;">Hi <?php echo $name; ?>,welcome to Harvard University course enrollment system!</h3>
	  <div class="btn-group btn-group-justified">
	  	<!--<a href="" class="btn btn-primary">Home</a>-->
	  	<a href="enrollment.php" class="btn btn-primary">Select courses</a>
	    <a href="class.php" class="btn btn-primary">Class Schedule</a>
	    <a href="logout.php" class="btn btn-primary">Logout</a>
	    

	  </div>
		
	</div>
	<div class="container">
	    <p>
            <button type="button" class="btn btn-warning col-md-12" data-toggle="modal" data-target="#exampleModal">
  				Search Courses
			</button>
			<br>
        </p>


     <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search Courses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div class="form-group">
				<form action = searchCourses.php method=post>
					<input type=text id="myInput" name=teacher size=50 placeholder="Search by teacher">
					<input type=submit name=bt class="memoBtn" value="searchTeacher">

					<br>
					<input type=text id="myInput" name=department size=50 placeholder="Search by department">
					<input type=submit name=bt class="memoBtn" value="SearchDepartment">
				</form>

			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<hr>
	<table class="table table-striped">
		<tr style="background-color: #91301a; color: white;">
			<td>Course ID</td>
			<td>Course Name</td>
			<td>Teacher</td>
			<td>Credit</td>
			<td>Department</td>
			<td>Course Time/Place</td>
			<td>Compulsory</td>
			<td>Number Limit</td>
			<td>Enroll</td>
		</tr>

	<?php

		$bt = mysqli_real_escape_string($conn,$_POST['bt']);
		if($bt == 'searchTeacher'){
			$teacher = mysqli_real_escape_string($conn,$_POST['teacher']);
			$s = mysqli_query($conn, "SELECT * FROM course left jOIN (SELECT * FROM membercourse where mID = '$id') AS sub ON course.Cid=sub.cID where Teacher='$teacher'");
			//$s = mysqli_query($conn, "SELECT * FROM course where Teacher='$teacher'");
		}
		else{
			$dep = mysqli_real_escape_string($conn,$_POST['department']);
			$s = mysqli_query($conn, "SELECT * FROM course left jOIN (SELECT * FROM membercourse where mID = '$id') AS sub ON course.Cid=sub.cID where Dep='$dep'");
			//$s = mysqli_query($conn, "SELECT * FROM course where Dep='$dep'");
		}

		while($r = mysqli_fetch_array($s))
		{
					if(is_null($r['mID'])){//沒加選的
			echo "<form action = enroll.php method=post>";
			echo "<tr><td><input name='courseID' type=hidden value=".$r['Cid'].">".$r['Cid']."</td><td>".$r['CName']."</td><td>".$r['Teacher']."</td><td>".$r['Credit']."</td><td>".$r['Dep']."</td><td>".$r['TimePlace']."</td><td>".$r['must']."</td><td>".$r['Plimit']."</td>";
			echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalLong".$r['Cid']."'>Introduction</button>";
			echo "&nbsp";
			echo "<input type=submit class='btn btn-primary' name=bt value=Enroll></td></tr>";
			echo "</form>";
			//Modal
			echo "<div class='modal fade' id='exampleModalLong".$r['Cid']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
  	<div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLongTitle'>".$r['CName']."</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        ".$r['Introduction']."
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>";
		}
		else{
			echo "<form action = drop.php method=post>";
			echo "<tr><td><input name='courseID' type=hidden value=".$r['Cid'].">".$r['Cid']."</td><td>".$r['CName']."</td><td>".$r['Teacher']."</td><td>".$r['Credit']."</td><td>".$r['Dep']."</td><td>".$r['TimePlace']."</td><td>".$r['must']."</td><td>".$r['Plimit']."</td>";
			echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalLong".$r['Cid']."'>Introduction</button>";
			echo "&nbsp";
			echo "<input type=submit class='btn btn-danger' name=bt value=Drop></td></tr>";
			echo "</form>";
			//Modal
			echo "<div class='modal fade' id='exampleModalLong".$r['Cid']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLongTitle'>".$r['CName']."</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        ".$r['Introduction']."
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>";	
		}
			


		}

	?>
	</table>

</div>
</body>
</html>