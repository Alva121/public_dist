<?php


function getAvailItemCount($item)
{
    include "db.php";
    $items=mysqli_query($conn,"select sum(qty) as `avail` from order_list where item='$item' and  (status='0' or status='2') group by item");//1 for delivered item,0 pending ,2 cancel order

   $row= mysqli_fetch_array($items);

return $row['avail'];
}

//show item
if($_GET['type']==1)
{
	include "db.php";


	$items=mysqli_query($conn,"select * from item");
	$a=array();

	while($row1= mysqli_fetch_assoc($items))
		{
           $row1['avail']=$row1['qty']-getAvailItemCount($row1['name']);
			array_push($a, $row1);
		}
	echo json_encode($a);
}


function addOrder($order_id,$card_no,$itm,$qty)
{

    include "db.php";

    $result=mysqli_query($conn,"insert into order_list (order_id,card_no,item,qty) values ('$order_id','$card_no','$itm','$qty')");

    if($result)
        echo "0";else "-1";
}
//add order
if($_GET['type']==2)
{

    $order_id=rand(1,10000);
    $card_no=$_GET['card_no'];
    $itm=$_GET['item'];
    $qty=$_GET['qty'];

    foreach ($itm as $key=>$item)
    {

        addOrder($order_id, $card_no,$item,$qty[$key]);


    }



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