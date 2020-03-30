<?php
// login
function login($email,$password)
{

if ($_SESSION['login']==true || ($email=="admin@gmail.com" && $password=="password"))
{
            $_SESSION['login']=true;
           header("Location:home.php");
}
        else {
        	echo "<script>alert('Try again');</script>";
        }
}


// view order
function vieworder()
{
  include "db.php";
$result=mysqli_query($conn,"select * from order_list  order by id desc");
while($row= mysqli_fetch_array($result))
{
  ?>
     <tr>
      <th scope="row"><?php echo $row["0"]; ?></th>
      <td><?php echo $row["1"]; ?></td>
      <td><?php echo $row["2"]; ?></td>
      <td><?php echo $row["3"]; ?></td>
      <td><?php echo $row["4"]; ?></td>
      <td>
      	<a href="?deleteorder=<?php echo $row[1]; ?>" name="deleteorder" class="btn btn-danger">Delete</a>
    </tr>
<?php
}}


// view item
function viewitem()
{
  include "db.php";
$result=mysqli_query($conn,"select * from item  order by id desc");
while($row= mysqli_fetch_array($result))
{
  ?>
     <tr>
      <th scope="row"><?php echo $row["0"]; ?></th>
      <th><img src="<?php echo $row["6"]; ?>" class="img-fluid" alt="error" style="height: 35px;width: 35px;"></th>
      <td><?php echo $row["1"]; ?></td>
      <td><?php echo $row["2"]; ?> <?php echo $row["3"]; ?></td>
      <td><?php echo $row["4"]; ?></td>
      <td><?php echo $row["5"]; ?></td>
      <td width="19%">
      	<a href="?deleteitem=<?php echo $row[1]; ?>" name="deleteitem" class="btn btn-danger">Delete</a>
      	<a href="?edititem=<?php echo $row[1]; ?>" name="edititem" class="btn btn-success">Update</a>
    </tr>
<?php
}}

//add Item
function additem($name,$price,$qty,$info,$unit)
{
  include "db.php";
  $fileinfo=PATHINFO($_FILES["image"]["name"]);
  $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
  move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $newFilename);
  $location="uploads/" . $newFilename;

$result=mysqli_query($conn,"insert into item (name,price,qty,info,media_id,unit) values ('$name','$price','$qty','$info','$location','$unit')");
if($result)
	{
  echo "<script>alert('Added successful');</script>";
	}
else
	{
   echo "<script>alert('Try again');</script>";
	}
}


//delete Item
function deleteitem($name)
{
    include "db.php";

//$conn connecting to data base

$result=mysqli_query($conn,"delete from item where name='$name'");

if($result)
	{
        echo "<script>alert('Deleted successful');</script>";
    }
    else
    {
        echo "<script>alert('Try again');</script>";
    }
}

//edit Item modal
function edititem($name){
    include "db.php";
$result=mysqli_query($conn,"select * from item  where name='$name'");
while($row= mysqli_fetch_array($result))
{
  ?>
  <div class="modal show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
      </div>
      <div class="modal-body">
          <form method="post" enctype="multipart/form-data" >
          	<input type="text" value="<?php echo $row["0"]; ?>" name="id" hidden>
            <div class="form-group">
               <label for="exampleInputEmail1">Name</label>
               <input type="text" name="name" class="form-control" value="<?php echo $row["1"]; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Item name" disabled>
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">Price</label>
               <input type="text" name="price" value="<?php echo $row["4"]; ?>" class="form-control" id="exampleInputPassword1" placeholder="Price">
            </div>
            <div class="form-group">
               <label for="exampleInputqty">Quantity</label>
               <input type="text" name="qty" value="<?php echo $row["2"]; ?>" class="form-control" id="exampleInputqty" placeholder="Quantity">
            </div>
            <button  type="Submit" name="updateitem" class="btn btn-primary mt-2">Submit</button>
          </form>
      </div>
      <div class="modal-footer">
      	<a href="items.php" type="button" class="btn btn-secondary">Close</a>
      </div>
    </div>
  </div>
</div>
<?php
}}


//update Item
function updateitem($id,$name,$price,$qty,$info)
{

  include "db.php";
  $fileinfo=PATHINFO($_FILES["image"]["name"]);
  $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
  move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $newFilename);
  $location="uploads/" . $newFilename;

$result=mysqli_query($conn,"UPDATE item SET price='$price',qty='$qty',media_id='$location' WHERE id='$id'");
if($result)
	{
  echo "<script>alert('Updated successful');</script>";
	}
else
	{
   echo "<script>alert('Try again');</script>";
	}
}


// view user
function viewuser()
{
  include "db.php";
$result=mysqli_query($conn,"select * from user  order by id desc");
while($row= mysqli_fetch_array($result))
{
  ?>
     <tr>
      <th scope="row"><?php echo $row["0"]; ?></th>
      <th><?php echo $row["1"]; ?></th>
      <td><?php echo $row["2"]; ?></td>
      <td><?php echo $row["3"]; ?></td>
      <td><?php echo $row["4"]; ?></td>
      <td><?php echo $row["6"]; ?></td>
      <td width="10%">
      	<a href="?deleteuser=<?php echo $row[1]; ?>" name="deleteuser" class="btn btn-danger">Delete</a>
    </tr>
<?php
}}



//delete User
function deleteuser($card)
{
    include "db.php";

$result=mysqli_query($conn,"delete from item where card_no='$card'");

if($result)
	{
        echo "<script>alert('Deleted successful');</script>";
    }
    else
    {
        echo "<script>alert('Try again');</script>";
    }
}

//add user
function adduser($cardno,$name,$address,$Income,$nation,$family)
{
  include "db.php";
$result=mysqli_query($conn,"insert into item (card_no,holder_name,address,income,nation,f_member) values ('$cardno','$name','$address','$Income','$nation','$family')");
if($result)
	{
  echo "<script>alert('Added successful');</script>";
	}
else
	{
   echo "<script>alert('Try again');</script>";
	}
}











?>
