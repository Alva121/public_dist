<?php


$con=mysqli_connect("localhost","root","","e_voting");
$area=$_GET['area'];

$adhar=$_GET['adhar'];


$q="select age,name,mobile from reg where area='$area' and adhar_id='$adhar'";



$res=mysqli_query($con,$q);

if(mysqli_num_rows($res)==0)
{
echo "-1";

}else
{

	$row=mysqli_fetch_array($res);
	echo json_encode($row);
}
