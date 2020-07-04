<?php
$adhar=$_GET['adhar_id'];
$v=$_GET['vote'];
$con=mysqli_connect("localhost","root","","e_voting");
if($v=='A')
{
	$q="INSERT INTO `vote` (`adhar_id`, `C`, `B`, `A`, `date_time`)
VALUES ('$adhar', '0', '0', '1', now());";

}else
if($v=='B')
{
	$q="INSERT INTO `vote` (`adhar_id`, `C`, `B`, `A`, `date_time`)
VALUES ('$adhar', '0', '1', '0', now());";
}
else
{
	$q="INSERT INTO `vote` (`adhar_id`, `C`, `B`, `A`, `date_time`)
VALUES ('$adhar', '1', '0', '0', now());";
}



$res=mysqli_query($con,$q);


if($res)
	echo 0;
else -1;

?>