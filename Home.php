<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<?php
$_SESSION['flag'] = "false";
if(isset($_POST["logsubmit"])){
  session_destroy();
  header("Location: Start.html");

}
if(isset($_POST["gosubmit"])) {
  $_SESSION['flag'] = "true";
  $ffrom = $_POST["from"];
  $fto = $_POST["to"];
  $fdate = $_POST["date"];
  $_SESSION['from'] = $_POST['from'];
  $_SESSION['to'] = $_POST['to'];
  $_SESSION['date'] = $_POST['date'];
  header("Location: table.php");
}
?>
  <title>Main user</title>
  <style type="text/css">
    body{
      font-family: arial, sans-serif;
      text-align: center;
      margin: 0 auto;
      background-image: url(Images/d.jpg);
      background-repeat: no-repeat;
      background-size: 100% 720px;
    }
    #nav{
      width: 100%;
      height: 650px;
    }
    #nav_wrapper{
      height: 80px;
      width: 600px;
      background: black;
      margin-left: 340px;
      margin-right: 300px;
      margin-top: 1px;
      opacity: 0.7;
      filter: alpha (opacity=70);
      border-radius: 10px;
    }
    #nav_wrapper ul li {
      list-style:none;
      display: inline;
      font-weight: bold;
      padding: 10px;
    }
    #nav_wrapper a {
      color: white;
      text-decoration: none;
      padding: 15px;
      margin-right: 10px;
      margin-left: 10px;
    }
    #nav_wrapper ul li:hover{
      background: #FFA500;
      transition: all 0.45s;
      border-radius: 10px;
      opacity: 0.6;
      filter: alpha (opacity=60);
    }
    span.reference{
        position:fixed;
        left:10px;
        bottom:10px;
        font-size:12px;
      }
      span.reference a{
        color:#aaa;
        text-transform:uppercase;
        text-decoration:none;
        text-shadow:1px 1px 1px #000;
        margin-right:30px;
      }
      span.reference a:hover{
        color:#ddd;
      }
      .cust{
        width: 300px;
        height: 450px;
        text-align: center;
        background-color: black;
        opacity: 0.7;
        border-radius: 10px;
        float: right;
        margin-top: 110px;
      }
      .cust img {
      width: 120px;
      height: 120px;
      margin-top: -60px;
      margin-bottom: 30px;
    }
    input[type="text"]{
      height: 25px;
      width: 100px;
      font-size: 13px;
      margin-bottom: 20px;
      background-color: #fff;
      padding-left: 5px;
      border-radius: 4px;
      float: left;
      font-style: bold;
    }
    .hide{
      display:none;
    }
    .find {
      padding: 15px 30px;
      opacity: 0.8;
      background-color:   #FFA500;
      border: 2px;
      color: black;
      font-style: bold;
      width: 130px;
      border-radius:  10px;
      margin-bottom: 20px;
      cursor: pointer;
      font-family:"Myriad Pro", "Trebuchet MS", sans-serif;
    }
    #btn_2 {
       width: 100px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 10px;
    font-size: 10px;
    visibility: hidden;
    background-repeat: no-repeat;
   height: 25px;
    }
    #btn_3 {
     width: 100px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 10px;
    font-size: 10px;
    visibility: hidden;
    background-repeat: no-repeat;
   height: 25px;
    }
    #btn_4 {
       width: 100px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 10px;
    font-size: 10px;
    visibility: hidden;
    background-repeat: no-repeat;
   height: 25px;
    }
   
    .col{
      border-radius:15px;
      background-color:#FFA500;
    }
* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;margin:0}
.mySlides {display:none}
.slideshow-container {
   position: relative;
    margin: 10%;
    width: 600px;
    height: 220px;
    float: left;
    margin-left: 200px;
    margin-top: 150px;
}
.dot {
    cursor:pointer;
    height: 7px;
    width: 7px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
    margin-top: .1%;
}
.active, .dot:hover {
    background-color: #717171;
}
.fade {
   -webkit-animation-name: fade;
   -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
}
@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
.sidenav {
    height: 170px;
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 13;
    left: 0;
    background-color: black;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    border-radius: 10px;
    opacity: 0.7;
}
.sidenav a {
     padding: 8px 8px 4px 10px;
    text-decoration: none;
    font-size: 20px;
    color: #ddd;
    display: block;
    transition: 0.3s
}
.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
    background: #FFA500;
      transition: all 0.45s;
      border-radius: 10px;
      opacity: 0.6;
      filter: alpha (opacity=60);
}
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
#main {
    transition: margin-left .5s;
    padding: 16px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#tt{
  float: left;
}
.button {
  border-radius: 7px;
  background-color: #FFA500;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 10px;
  width: 140px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
.button:hover span {
  padding-right: 25px;
}
.button:hover span:after {
  opacity: 1;
  right: 0;
}
  </style>


</head>

<body>
  <div id="nav"><br>

    <div class="cust">
    <img src="Images/t.png">
      <form method="post" name="Form" onSubmit="return checkstatevalue()" action="">
        
          

        <br>
        
        <a href="table.php">
        <button  type="button" name="submit" class="button"> <span> Find Buses</span></button></a>
        <br>
        <br>
        <button  type="button" name="submit" class="button" onclick='javascript:show_hide("btn_1","btn_2","btn_3","btn_4","btn_5")' id='btn_1'> <span> Specific Tour</span></button>
        <br>
        <br>
        <br>
        <form method="post" name="Form" onsubmit="" action="">
        <input list="from" type="text" name="from" id="btn_3" placeholder="FROM . . .  " style="
    border: 2px solid #ccc;
    border-radius: 10px;
    font-size: 10px;
    width: 100px;
   height: 25px;
   float: left;
   margin-left: 40px;" required="" >
<datalist id="from">
 <?php 
  $query = "SELECT tfrom FROM tours";
   while($row = mysql_fetch_assoc($query)){
    ?>
  <option value="<?php echo $row['tfrom']; ?>">
  <?php } ?> 
</datalist>

<input list="to" type="text" name = "to" id="btn_2" placeholder="TO . . .  " style="
    border: 2px solid #ccc;
    border-radius: 10px;
    font-size: 10px;
    width: 100px;
   height: 25px;
   margin-right: 40px;
   margin-left: 10px" required="">
<datalist id="to" style="float: left;">
  <?php 
  $query = "SELECT tto FROM tours";
   while($row = mysql_fetch_assoc($query)){
    ?>
  <option value="<?php echo $row['tto']; ?>">
  <?php } ?> 
</datalist>
<br>
<br>
<input list="date" type="text" name="date" id="btn_4" placeholder="YY/MM/DD . . .  " style="
    border: 2px solid #ccc;
    border-radius: 10px;
    font-size: 10px;
    width: 100px;
   height: 25px;
   margin-right: 100px;
   margin-left: 100px" required="">
<datalist id="date" style="float: left;">
    <option value="DD/MM/YYYY">
    
    
</datalist>
<br>
<br>

<button  type="submit" name="gosubmit" class="button" id="btn_5" style="visibility: hidden;"> <span> GO! </span></button>

</form>

<script>
    var from = [
    ];
    for (var key in from) {
        var optionElement = document.createElement("option");
        optionElement.value = from[key];
        document.getElementById("from").appendChild(optionElement);
    }
      var to = [
    ];
    for (var key in to) {
        var optionElement = document.createElement("option");
        optionElement.value = from[key];
        document.getElementById("to").appendChild(optionElement);
    }
    var date = [
        
    ];
    for (var key in date) {
        var optionElement = document.createElement("option");
        optionElement.value = from[key];
        document.getElementById("date").appendChild(optionElement);
    }
</script>


        <script language='javascript' type='text/javascript'>
 
        function show_hide(id2hide, id2show, id2show2, id2hide2, id2show3)
        {
            document.getElementById(id2hide).style.visibility='visible';
            document.getElementById(id2show).style.visibility='visible';
            document.getElementById(id2show2).style.visibility='visible';
             document.getElementById(id2hide2).style.visibility='visible';
            document.getElementById(id2show3).style.visibility='visible';
        }
 
    </script>


      </form>

    </div><br>

      <div id="nav_wrapper"><br>
        <ul>
          <li><a href="Profile.php">Profile and booked tickets' information</a></li>


        </ul>

      </div>


<div id="mySidenav" class="sidenav" style="float: left;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <form method="post"><button class="button" type="submit" name="logsubmit"><span>Log out</span></button> </form>
  <button class="button hide" id="adminized" onclick="window.location='AdminAdd.php'" name="addTour"><span>Add tour</span></button>
</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()" id="tt">&#9776;</span>


      <div class="slideshow-container">


<div class="mySlides fade" >

  <img src="Images/p13.png" style="width:100%">
</div>

<div class="mySlides fade">

  <img src="Images/p2.png" style="width:100%">
</div>

<div class="mySlides fade">

  <img src="Images/p10.png" style="width:100%">
</div>
<div class="mySlides fade">

  <img src="Images/p6.png" style="width:100%">
</div>
<div class="mySlides fade">

  <img src="Images/p8.png" style="width:100%">
</div>
<div class="mySlides fade">

  <img src="Images/p5.png" style="width:100%">
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>


  </div>



<div>
            <span class="reference" >
                <a href="@">Contact us</a>
        <a href="@">Terms</a>
        <a href="@">Developers</a>
        <a href="@">Help</a>
        <a href="@">Cookies</a>

        <a href="Admin's_form.html" style="display: none;">privacy</a>
        <audio controls autoplay style="display: none;" id="background_audio" autoplay="autoplay">

  <source src="images\k.mp3" type="audio/mpeg">

</audio>



<button type="button" class="button" style="margin-left: 800px; background-color: black; width: 80px; opacity: 0.7;" href="#noscroll" id="mute">Mute</button>
<script type="text/javascript">
  var audio = document.getElementById('background_audio');
document.getElementById('mute').addEventListener('click', function (e)
{
    e = e || window.event;
    audio.muted = !audio.muted;
    e.preventDefault();
  }, false);
</script>



            </span>
    </div>
    <script>
var slideIndex = 0;
showSlides();
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 3000);
}
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
</script>
<?php
    $servername="localhost";
    $username="root"; 
    $password="";
    $dbname="ebtdb"; 
    $conn= new mysqli($servername,$username,$password,$dbname);
    $currUser = $_SESSION['username'];
    $admin = 0;
    if($conn->connect_error){
    die("Connection failed:". $conn->connect_error);
  }
    $sql = "SELECT admin FROM users WHERE username = '$currUser'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)) {
         $admin = $row["admin"];
    }
}
      if($admin==1){
        echo "<script>document.getElementById('adminized').classList.remove('hide')</script>";
      }
?>

</body>
</html>