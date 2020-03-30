<?php
session_start();
include 'helper.php';

if(!isset($_SESSION["login"]))
{
  header("location:index.php");
}

if(isset($_POST['logout']))
{
  session_destroy();
    header("location:index.php");
}
if(isset($_POST['additem']))
{
  $name=$_POST['name'];
  $price=$_POST['price'];
  $qty=$_POST['qty'];
  $info=$_POST['info'];
  $unit=$_POST['unit'];
    additem($name,$price,$qty,$info,$unit);
}
if(isset($_GET['deleteitem']))
{
    $name=$_GET['deleteitem'];
    deletebin($name);
}
if(isset($_GET['edititem']))
{
    $name=$_GET['edititem'];
    edititem($name);
}
if(isset($_POST['updateitem']))
{
  $id=$_POST['id'];
  $name=$_POST['name'];
  $price=$_POST['price'];
  $qty=$_POST['qty'];
  $info=$_POST['info'];
   updateitem($id,$name,$price,$qty,$info);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/pulse/bootstrap.min.css" rel="stylesheet" integrity="sha384-FnujoHKLiA0lyWE/5kNhcd8lfMILbUAZFAT89u11OhZI7Gt135tk3bGYVBC2xmJ5" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<style>
	.card
	{
padding: 15px;
margin-top: 20px;
	}
</style>

</head>
<body style="background-color: #a29bfe">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">
   <svg class="bi bi-people" width="1.3em" height="1.3em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M17 16s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002zM9.022 15h7.956a.274.274 0 00.014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C15.688 12.629 14.718 12 13 12c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 00.022.004zm7.973.056v-.002zM13 9a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zm-7.064 4.28a5.873 5.873 0 00-1.23-.247A7.334 7.334 0 007 11c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 017 15c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM6.92 12c-1.668.02-2.615.64-3.16 1.276C3.163 13.97 3 14.739 3 15h3c0-1.045.323-2.086.92-3zM3.5 7.5a3 3 0 116 0 3 3 0 01-6 0zm3-2a2 2 0 100 4 2 2 0 000-4z" clip-rule="evenodd"/>
</svg>
    Public Distribution system
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="custom.php">Customer</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="orders.php">Orders</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="register.php">Registration</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item active">
   <form method="post">
        <button name="logout" class="nav-link btn btn-link" href="#">Logout</button>
    </form>
      </li>
    </ul>
  </div>
</nav>
	<div class="container-fluid">
		<div class="row">
    <div class="col-8">
      <div class="card">
        <div class="card-header">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">photo</th>
                            <th scope="col">name</th>
                            <th scope="col">qty</th>
                            <th scope="col">price</th>
                            <th scope="col">info</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php viewitem(); ?>
                        </tbody>
                    </table>
        </div>
      </div>
    </div> 
    <div class="col-4">
      <div class="card">
        <div class="card-header">
         <h3>Add Items</h3> 
        </div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
               <label for="exampleInputEmail1">Name</label>
               <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Item name">
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">Price</label>
               <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Price">
            </div>
            <div class="form-group">
               <label for="exampleInputtext">Info</label>
               <textarea  class="form-control" name="info" id="exampleInputtext" placeholder="Product Info"></textarea>
            </div>
            <div class="form-group">
               <label for="exampleInputqty">Quantity</label>
               <input type="text" name="qty" class="form-control" id="exampleInputqty" placeholder="Quantity">
            </div>
            <div class="form-group">
              <label for="measure">Unit of measurement</label><br/>
<div class="form-check form-check-inline" id="measure">
  <input class="form-check-input" type="radio" name="unit" id="inlineRadio1" value="Kg">
  <label class="form-check-label" for="inlineRadio1">Kg</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="unit" id="inlineRadio2" value="liters">
  <label class="form-check-label" for="inlineRadio2">Liter</label>
</div>
            </div>
            <div>
            <label for="examplefile">Photo</label>
            <div class="custom-file" id="examplefile">
               <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" required>
               <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
               <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
            </div>
            <button name="additem" class="btn btn-primary mt-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</body>
  <script type="text/javascript">
    $(document).ready(function() 
    {
    $('#example').DataTable();
    });
  </script>
</html>