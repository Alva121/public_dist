<?php
session_start();

$con=mysqli_connect("localhost","root","","public_dist");
// $area=$_GET['area'];
$fid=$_GET['fid'];


$q="select * from user where fid='$fid'";



$res=mysqli_query($con,$q);

if(mysqli_num_rows($res)>0)
{

	
$_SESSION['login']=true;
 echo "0";

}else
{ 
	echo "-1";

	// $row=mysqli_fetch_array($res);
	// echo json_encode($row);
}
