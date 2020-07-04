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

if(isset($_GET['deliverorder']))
{
    $id=$_GET['deliverorder'];
    deliverorder($id);
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

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="js/mqtt.js"></script>

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
        <a class="nav-link" href="items.php">Items</a>
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
    <div class="col-1">
    </div> 
    <div class="col-2">
      <div id="status"></div>
            <div class="card">
        <div class="card-header">
          <h3>Pump</h3>
        </div>
        <div class="card-header">
          <a href="#" class="btn btn-success" onclick="onSend('a');">ON</a>
          <a href="#" class="btn btn-danger" onclick="onSend('b');">OFF</a>
        </div>
      </div>
    </div> 
    <div class="col-8">
      <div class="card">
        <div class="card-header"><h3>Order List</h3></div>
        <div class="card-header">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">order_id</th>
                            <th scope="col">ration card number</th>
                            <th scope="col">item</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php vieworder(); ?>
                        </tbody>
                    </table>
        </div>
      </div>
    </div> 
    <div class="col-1"></div>
    </div>
  </div>
</body>
  <script type="text/javascript">
    $(document).ready(function() 
    {
    $('#example').DataTable();
    });



$('#main').show();
$('#vote').hide();
$('#reg').hide();
var fid;
var rc;
  
  var mqtt;
    var reconnectTimeout = 1000;
    var host,port;
     var username;
     var password;
    function MQTTconnect() {
   


    host='broker.mqttdashboard.com';
    port=8000;
  if (typeof path == "undefined") {
    path = '/mqtt';
  }
  mqtt = new Paho.MQTT.Client(host,parseInt(port),
      path,
      "web_" + parseInt(Math.random() * 100, 10)
  );
        var options = {
            timeout: 60,
            useSSL: false,
            cleanSession:true,
            onSuccess: onConnect,
            onFailure: function (message) {
              $('#status').html("server:fail to connect");
            }
        }
        mqtt.onConnectionLost = onConnectionLost;
        mqtt.onMessageArrived = onMessageArrived;

        if (username != null) {
            options.userName = username;
            options.password = password;
        }
       // console.log("Host="+ host + ", port=" + port + ", path=" + path + " TLS = " + useTLS + " username=" + username + " password=" + password);
  try{
        mqtt.disconnect();
      }catch(e){}finally{
        mqtt.connect(options);
      }
      

    }

    function onConnect() {
        $('#status').html("server:connected");
       //  $('#gif-mp4').play();
     //  alert('Connected to ' + host + ':' + port + path);
        // Connection succeeded; subscribe to our topic
    //    mqtt.subscribe("slekin/fingerprint", {qos: 0});
         //mqtt.subscribe("VCET_IOT/temp", {qos: 0});
        rc=true;
      
    }

    function onConnectionLost(response) {
     
       $('#status').html("server:connect lost");
     
        setTimeout(MQTTconnect, reconnectTimeout);
       
      
     
    };
  
    function onMessageArrived(message) {


         var topic = message.destinationName;
             var payload = message.payloadString;
   //alert(payload);
     var data=JSON.parse(payload);
    

    }

     function onLogout()
     {
      rc=false;
      mqtt.disconnect();

     }
    function onSend(a)//not used

    {

      message = new Paho.MQTT.Message(a);
    message.destinationName = "public_dist/send";
    message.qos=0;
    mqtt.send(message); 
    }


    window.onload = function() {
           MQTTconnect();
         //  $('#gif-mp4').play();
};




$(document).ready(function(){

$('#vote1').hide();
$('#regbtn').click(function(){


    $.ajax({
cache: false,
    type: "GET",
  url: "./REST/reg.php?"+$('#form1').serialize(),
  error: function(html)
{



},
  success: function(html){

 if(html=="0")
  {
    alert("successfully Registered");
     $('#form1')[0].reset();
    
  }else{
    alert("Error");
  }
 
  }});



});

$('#verify').click(function(){


    $.ajax({
cache: false,
    type: "GET",
  url: "./REST/verify.php?"+$('#form2').serialize(),
  error: function(html)
{



},
  success: function(html){

 if(html=="-1")
  {

    $('#status1').html("Verify faied");
    $('#vote1').hide();

  }else
  {
    
    data=JSON.parse(html);
    $('#name').html("Name:"+data['name']);
    $('#mob').html("Mobile:"+data['mobile']);
    if(data['age']<18)
    {
      $('#status1').html("Verify faied:age should be above 18");
      $('#vote1').hide();
    }
else
{
   $('#status1').html("Verify success procced to Vote");
   $('#status1').removeClass('alert-danger');
   $('#status1').addClass('alert-success');
   $('#vote1').show();
   
}
    

  }
 
  }});

function vote(id,adhar){

 $.ajax({
cache: false,
    type: "GET",
  url: "./REST/vote.php?adhar_id="+adhar+"&vote="+id,
  error: function(html)
{



},
  success: function(html){

 if(html=="0")
  {
    alert("successfully Votted..");
  }else{
    alert("Duplicate vote");
  }
 
  }});

}

$('#v1').click(function(){
vote('A',$('#adhar').val());
});

$('#v2').click(function(){
  vote('B',$('#adhar').val());
});


$('#v3').click(function(){
  vote('C',$('#adhar').val());
});


});








});

  </script>
</html>