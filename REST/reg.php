<?php


$con=mysqli_connect("localhost","root","","public_dist");
  $cardno=$_GET['cardno'];
  $name=$_GET['name'];
  $address=$_GET['address'];
  $income=$_GET['income'];
  $nation=$_GET['nationality'];
  $family=$_GET['family'];
  $f_id=$_GET['f_id'];

// insert into user (card_no,holder_name,address,income,nation,f_member) values ('$cardno','$name','$address','$Income','$nation','$family')

$q="insert into user (card_no,holder_name,address,income,nation,f_member,fid) values ('$cardno','$name','$address','$income','$nation','$family','$f_id');";

$res=mysqli_query($con,$q);


if($res)
	echo 0;
else -1;

?>
