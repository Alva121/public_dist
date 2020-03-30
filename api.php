<?php


//show item
if($_GET['type']==1)
{
	include "db.php";


	$items=mysqli_query($conn,"select * from item");
	$a=array();

	while($row1= mysqli_fetch_assoc($items))
		{
			array_push($a, $row1);
		}
	echo json_encode($a);
}


//add order
if($_GET['type']==2)
{

    $order_id=$_GET['order_id'];
    $card_no=$_GET['card_no'];
    $itm=$_GET['itm'];
    $qty=$_GET['qty'];

    include "db.php";

    $result=mysqli_query($conn,"insert into order_list (order_id,card_no,item,qty) values ('$order_id','$card_no','$itm','$qty')");
    
    if($result)
    echo "0";else echo "-1";

}



//show my order
if($_GET['type']==3)
{

    $card_no=$_GET['card_no'];

    include "db.php";

	$order=mysqli_query($conn,"select * from order_list where card_no='$card_no'");
	$b=array();

	while($row1= mysqli_fetch_assoc($order))
		{
			array_push($b, $row1);
		}
	echo json_encode($b);

}


//user login
if($_GET['type']==4)
{
	$card=$_GET['card_no'];
	$name=$_GET['name'];

	include "db.php";

	$result=mysqli_query($conn,"select * from user where card_no='$card' and holder_name='$name' ");
	if(mysqli_num_rows($result)>0)
    	echo "0";else echo "-1";
}

?>