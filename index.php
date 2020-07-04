<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/mqtt.js"></script>
  <title></title>
  <style type="text/css">
      .card
  {
padding: 15px;
margin-top: 20px;
  }
    body{
  background-color: #2c3439;
    }
    video::-webkit-media-controls {
  display: none;
}

/* Could Use thise as well for Individual Controls */
video::-webkit-media-controls-play-button {}

video::-webkit-media-controls-volume-slider {}

video::-webkit-media-controls-mute-button {}

video::-webkit-media-controls-timeline {}

video::-webkit-media-controls-current-time-display {}
  </style>
</head>
<body class="container">
<div class="text-success  my-3" id="status">Mqtt Online</div>
<div id="main" class="container">
    
         <div class="row">
          <div class="mx-auto"  style="width: 480px">
            <video class="" 
            id="gif-mp4"
            autoplay
            style="max-width:480px" 
            loop>
            <source src="giphy.mp4" type="video/mp4"></source>
            Your browser does not support the mp4 video codec.
        </video>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 text-center mx-auto text-light font-weight-bolder" >Waiting to Scan your finger</div>
        </div>
</div>
<!--main block-->


<div id="vote">

    <div class="bg-light p-4 my-2">
      Welcome to Admin <span class="float-right"><a class=" btn btn-danger" href="">Logout</a></span>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card p-3">
          <b id="name">Name</b>
          <b id="mob">Mobile Number:</b>
        </div>
      </div>
      <div class="col-md-8">
        <div class="p-2 text-light"> 
          E voting System
        </div>
                <form id="form2">
                  <div class="form-group">
                    <select class="form-control" name="area" id="area">
                    <option>Manglore</option>
                    <option>Udupi</option>
                    <option>Puttur</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" name="adhar" id="adhar"  placeholder="Enter Adhar Number">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-success" id="verify" type="button">Verify</button>
                  </div>
             
                </form>
        <div class="alert alert-danger" id="status1">Provide Adhar and Location</div>

        <div class="form-group">
                    <div class="btn-group" id="vote1">
                    <button class="btn btn-primary" id="v1">Vote for A</button>
                    <button class="btn btn-danger" id="v2">Vote for B</button>
                    <button class="btn btn-info" id="v3">Vote for C</button>  
                    </div>
                </div>
      </div>
    </div>

</div>
<!--vote block-->




<div id="reg" class="row">
<div class="col-md-6 mx-auto mt-5">
    <div class="card">
      <div class="card-header" style="background-color: unset;text-align: center;border-bottom: none;"><p><h3>Registration</h3></p></div>
<form action="#" method="post" id='form1'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCardno">Enter ration card number</label>
      <input type="text" class="form-control" name="cardno" id="inputCardno" placeholder="Card No" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputName">Card holder name</label>
      <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Address" required>
  </div>
  <div class="form-row">
<div class="form-group col-md-6">
   <div class="form-group">
      <label for="inputradio">Income</label><br/>
   <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="income" id="inlineRadio1" value="APL">
  <label class="form-check-label" for="inlineRadio1">APL</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="income" id="inlineRadio2" value="BPL">
  <label class="form-check-label" for="inlineRadio2">BPL</label>
</div>
</div>
</div>
<div class="form-group col-md-6">
      <label for="inputNation">Nationlity</label>
      <select id="inputNation" name="nationality" class="form-control" required>
  <option value="afghan">Afghan</option>
  <option value="albanian">Albanian</option>
  <option value="algerian">Algerian</option>
  <option value="american">American</option>
  <option value="andorran">Andorran</option>
  <option value="angolan">Angolan</option>
  <option value="antiguans">Antiguans</option>
  <option value="argentinean">Argentinean</option>
  <option value="armenian">Armenian</option>
  <option value="australian">Australian</option>
  <option value="austrian">Austrian</option>
  <option value="azerbaijani">Azerbaijani</option>
  <option value="bahamian">Bahamian</option>
  <option value="bahraini">Bahraini</option>
  <option value="bangladeshi">Bangladeshi</option>
  <option value="barbadian">Barbadian</option>
  <option value="barbudans">Barbudans</option>
  <option value="batswana">Batswana</option>
  <option value="belarusian">Belarusian</option>
  <option value="belgian">Belgian</option>
  <option value="belizean">Belizean</option>
  <option value="beninese">Beninese</option>
  <option value="bhutanese">Bhutanese</option>
  <option value="bolivian">Bolivian</option>
  <option value="bosnian">Bosnian</option>
  <option value="brazilian">Brazilian</option>
  <option value="british">British</option>
  <option value="bruneian">Bruneian</option>
  <option value="bulgarian">Bulgarian</option>
  <option value="burkinabe">Burkinabe</option>
  <option value="burmese">Burmese</option>
  <option value="burundian">Burundian</option>
  <option value="cambodian">Cambodian</option>
  <option value="cameroonian">Cameroonian</option>
  <option value="canadian">Canadian</option>
  <option value="cape verdean">Cape Verdean</option>
  <option value="central african">Central African</option>
  <option value="chadian">Chadian</option>
  <option value="chilean">Chilean</option>
  <option value="chinese">Chinese</option>
  <option value="colombian">Colombian</option>
  <option value="comoran">Comoran</option>
  <option value="congolese">Congolese</option>
  <option value="costa rican">Costa Rican</option>
  <option value="croatian">Croatian</option>
  <option value="cuban">Cuban</option>
  <option value="cypriot">Cypriot</option>
  <option value="czech">Czech</option>
  <option value="danish">Danish</option>
  <option value="djibouti">Djibouti</option>
  <option value="dominican">Dominican</option>
  <option value="dutch">Dutch</option>
  <option value="east timorese">East Timorese</option>
  <option value="ecuadorean">Ecuadorean</option>
  <option value="egyptian">Egyptian</option>
  <option value="emirian">Emirian</option>
  <option value="equatorial guinean">Equatorial Guinean</option>
  <option value="eritrean">Eritrean</option>
  <option value="estonian">Estonian</option>
  <option value="ethiopian">Ethiopian</option>
  <option value="fijian">Fijian</option>
  <option value="filipino">Filipino</option>
  <option value="finnish">Finnish</option>
  <option value="french">French</option>
  <option value="gabonese">Gabonese</option>
  <option value="gambian">Gambian</option>
  <option value="georgian">Georgian</option>
  <option value="german">German</option>
  <option value="ghanaian">Ghanaian</option>
  <option value="greek">Greek</option>
  <option value="grenadian">Grenadian</option>
  <option value="guatemalan">Guatemalan</option>
  <option value="guinea-bissauan">Guinea-Bissauan</option>
  <option value="guinean">Guinean</option>
  <option value="guyanese">Guyanese</option>
  <option value="haitian">Haitian</option>
  <option value="herzegovinian">Herzegovinian</option>
  <option value="honduran">Honduran</option>
  <option value="hungarian">Hungarian</option>
  <option value="icelander">Icelander</option>
  <option value="india" selected>India</option>
  <option value="indonesian">Indonesian</option>
  <option value="iranian">Iranian</option>
  <option value="iraqi">Iraqi</option>
  <option value="irish">Irish</option>
  <option value="israeli">Israeli</option>
  <option value="italian">Italian</option>
  <option value="ivorian">Ivorian</option>
  <option value="jamaican">Jamaican</option>
  <option value="japanese">Japanese</option>
  <option value="jordanian">Jordanian</option>
  <option value="kazakhstani">Kazakhstani</option>
  <option value="kenyan">Kenyan</option>
  <option value="kittian and nevisian">Kittian and Nevisian</option>
  <option value="kuwaiti">Kuwaiti</option>
  <option value="kyrgyz">Kyrgyz</option>
  <option value="laotian">Laotian</option>
  <option value="latvian">Latvian</option>
  <option value="lebanese">Lebanese</option>
  <option value="liberian">Liberian</option>
  <option value="libyan">Libyan</option>
  <option value="liechtensteiner">Liechtensteiner</option>
  <option value="lithuanian">Lithuanian</option>
  <option value="luxembourger">Luxembourger</option>
  <option value="macedonian">Macedonian</option>
  <option value="malagasy">Malagasy</option>
  <option value="malawian">Malawian</option>
  <option value="malaysian">Malaysian</option>
  <option value="maldivan">Maldivan</option>
  <option value="malian">Malian</option>
  <option value="maltese">Maltese</option>
  <option value="marshallese">Marshallese</option>
  <option value="mauritanian">Mauritanian</option>
  <option value="mauritian">Mauritian</option>
  <option value="mexican">Mexican</option>
  <option value="micronesian">Micronesian</option>
  <option value="moldovan">Moldovan</option>
  <option value="monacan">Monacan</option>
  <option value="mongolian">Mongolian</option>
  <option value="moroccan">Moroccan</option>
  <option value="mosotho">Mosotho</option>
  <option value="motswana">Motswana</option>
  <option value="mozambican">Mozambican</option>
  <option value="namibian">Namibian</option>
  <option value="nauruan">Nauruan</option>
  <option value="nepalese">Nepalese</option>
  <option value="new zealander">New Zealander</option>
  <option value="ni-vanuatu">Ni-Vanuatu</option>
  <option value="nicaraguan">Nicaraguan</option>
  <option value="nigerien">Nigerien</option>
  <option value="north korean">North Korean</option>
  <option value="northern irish">Northern Irish</option>
  <option value="norwegian">Norwegian</option>
  <option value="omani">Omani</option>
  <option value="pakistani">Pakistani</option>
  <option value="palauan">Palauan</option>
  <option value="panamanian">Panamanian</option>
  <option value="papua new guinean">Papua New Guinean</option>
  <option value="paraguayan">Paraguayan</option>
  <option value="peruvian">Peruvian</option>
  <option value="polish">Polish</option>
  <option value="portuguese">Portuguese</option>
  <option value="qatari">Qatari</option>
  <option value="romanian">Romanian</option>
  <option value="russian">Russian</option>
  <option value="rwandan">Rwandan</option>
  <option value="saint lucian">Saint Lucian</option>
  <option value="salvadoran">Salvadoran</option>
  <option value="samoan">Samoan</option>
  <option value="san marinese">San Marinese</option>
  <option value="sao tomean">Sao Tomean</option>
  <option value="saudi">Saudi</option>
  <option value="scottish">Scottish</option>
  <option value="senegalese">Senegalese</option>
  <option value="serbian">Serbian</option>
  <option value="seychellois">Seychellois</option>
  <option value="sierra leonean">Sierra Leonean</option>
  <option value="singaporean">Singaporean</option>
  <option value="slovakian">Slovakian</option>
  <option value="slovenian">Slovenian</option>
  <option value="solomon islander">Solomon Islander</option>
  <option value="somali">Somali</option>
  <option value="south african">South African</option>
  <option value="south korean">South Korean</option>
  <option value="spanish">Spanish</option>
  <option value="sri lankan">Sri Lankan</option>
  <option value="sudanese">Sudanese</option>
  <option value="surinamer">Surinamer</option>
  <option value="swazi">Swazi</option>
  <option value="swedish">Swedish</option>
  <option value="swiss">Swiss</option>
  <option value="syrian">Syrian</option>
  <option value="taiwanese">Taiwanese</option>
  <option value="tajik">Tajik</option>
  <option value="tanzanian">Tanzanian</option>
  <option value="thai">Thai</option>
  <option value="togolese">Togolese</option>
  <option value="tongan">Tongan</option>
  <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
  <option value="tunisian">Tunisian</option>
  <option value="turkish">Turkish</option>
  <option value="tuvaluan">Tuvaluan</option>
  <option value="ugandan">Ugandan</option>
  <option value="ukrainian">Ukrainian</option>
  <option value="uruguayan">Uruguayan</option>
  <option value="uzbekistani">Uzbekistani</option>
  <option value="venezuelan">Venezuelan</option>
  <option value="vietnamese">Vietnamese</option>
  <option value="welsh">Welsh</option>
  <option value="yemenite">Yemenite</option>
  <option value="zambian">Zambian</option>
  <option value="zimbabwean">Zimbabwean</option>
      </select>
    </div>
</div>
<div class="form-group">
      <label for="inputCardno">Enter family member name</label>
      <input type="text" class="form-control" name="family" id="inputCardno" placeholder="Family member name" required>
    </div>
    <div class="form-group">
      <input type="text" name="f_id"  id='f_id' class="form-control" placeholder="Enter Userid" required="true">
    </div>
    <div class="btn-toolbar row" role="toolbar" aria-label="Toolbar with button groups">
   <div class="btn-group  col-md-6" role="group" aria-label="Third group">
    <button type="submit" name="adduser" id='regbtn' class="btn btn-primary btn-sm btn-block">Submit</button>
  </div>
    <div class="btn-group col-md-6" role="group" aria-label="Third group">
    <button type="reset" name="reset" class="btn btn-danger btn-sm btn-block">Reset</button>
  </div>
</div>
</form>
</div>

</div>


</div>
<!--Reg block-->







</body>

<script type="text/javascript">
$('#main').show();
$('#vote').hide();
$('#reg').hide();
var fid;
var rc;
  var $canPlay = !!document.createElement('video').canPlayType('video/mp4; codecs=avc1.42E01E,mp4a.40.2');
  var mqtt;
    var reconnectTimeout = 1000;
    var host,port;
     var username;
     var password;
    function MQTTconnect() {
      if($canPlay == false) {
            $('#gif-mp4').hide();
            $('#gif-mp4').play();
            $('#noplay').show();
        }


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
        mqtt.subscribe("public_dist/rec", {qos: 0});
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
     if(data['auth']=="123")
     {
     //  $('#form1')[0].reset();
      // $('#form2')[0].reset();
      fid=data['fid'];
      if(data['type']==0)
      {

        login(fid);
       
         //$('#vote').show();
          $('#main').hide();
          $('#reg').hide();
      }
      else
      {

          $('#vote').hide();
          $('#main').hide();
          $('#reg').show();
           $('#f_id').val(fid);



      }
      }


    }

    function login(id)
    {

$.ajax({
cache: false,
    type: "GET",
  url: "./REST/login.php?fid="+id,
  error: function(html)
{



},
  success: function(html){

 if(html=="0")
  {
    window.location.replace("home.php");
  }else{
    alert("login failed");
  }
 
  }});
    }

     function onLogout()
     {
      rc=false;
      mqtt.disconnect();

     }
    function onSend(a)//not used

    {

      message = new Paho.MQTT.Message(a);
    message.destinationName = "mq123";
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

//alert($('#form1').serialize());
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