<?php

$con=mysqli_connect("localhost","root","","e_voting");

$name=$_GET['name'];
$age=$_GET['age'];
$area=$_GET['area'];
$phone=$_GET['phone'];
$f_id=$_GET['f_id'];
$adhar=$_GET['adhar'];


$q="INSERT INTO `reg` (`name`, `age`, `area`, `mobile`, `adhar_id`, `finger_id`)VALUES ('$name', '$age', '$area', '$phone', '$adhar', '$f_id');";

$res=mysqli_query($con,$q);


if($res)
	echo 0;
else -1;


?>