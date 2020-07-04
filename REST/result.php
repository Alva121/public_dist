<?php


if(isset($_GET['close']))
{
	$con=mysqli_connect("localhost","root","","e_voting");
//$area=$_POST['area'];




$q="delete from vote";
$res=mysqli_query($con,$q);
}
if($_POST)
{
$con=mysqli_connect("localhost","root","","e_voting");
$area=$_POST['area'];




$q="select sum(A),sum(B),sum(C) from reg r,vote v where r.area='$area' and v.adhar_id=r.adhar_id";
$res=mysqli_query($con,$q);
if(mysqli_num_rows($res)==0)
{
	echo "<script>alert('No voting done in this area')</script>";
	exit(0);
}

$res=mysqli_query($con,$q);


	$row=mysqli_fetch_array($res);
echo '<div class="card p-3">
	<div class="card-header">Results</div>
	<div class="card-body">
		<p>Vote for A:'.$row[0].'</p>
		<p>Vote for B:'.$row[1].'</p>
		<p>Vote for C:'.$row[2].'</p>

	</div>
	<div class="card-footer">
		<a class="btn btn-danger" href="?close&adhar_id=">Clear Voting</a>
	</div>
</div>';


}
?>


<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled JavaScript -->
<script src="../js/bootstrap.min.js"></script>

	<title></title>
	<style type="text/css">
		
		body{
	background-color: #2c3439;
		}
    video::-webkit-media-controls {
  display: none;
}

/* Could Use thise as well for Individual Controls */
video::-webkit-media-controls-play-button {}

video::-webkit-media-controls-volume-slider {}

video::-webkit-media-controls-mute-button {}

video::-webkit-media-controls-timeline {}

video::-webkit-media-controls-current-time-display {}
	</style>
</head>
<body class="container">

<form id="form2" action="" method="post">
                	<div class="form-group">
                		<select class="form-control" name="area" id="area">
                		<option>Manglore</option>
                    <option>Udupi</option>
                    <option>Puttur</option>
                	</select>
                	</div>
                	<div class="form-group">
                		<button class="btn btn-success" id="verify" type="submit">GET Result</button>
                	</div>
             
                </form>


</body>

</html>