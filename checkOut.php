<?php
session_start();
?>
<?php 
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="ebtdb"; 
	$bid = array("CK201718","CS201715","HS201711"); //tempstatic
	$bseats = array("4","2","1"); //tempstatic
	$total = 0;
	//$bid = $_SESSION['bid'];
	//$bseats = $_SESSION['bseats'];
	$currUser = $_SESSION['username'];
	$currSeats = 0;
	$conn= new mysqli($servername,$username,$password,$dbname);

	if($conn->connect_error){
		die("Connection failed:". $conn->connect_error);
	}
	if(isset($_POST['confirm'])){
	if($conn->connect_error){
		die("Connection failed:". $conn->connect_error);
	}
	$index2=0;
	foreach ($bid as $currID){
	$sql = "SELECT seats FROM tours WHERE id = '$currID'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
         $currSeats = $row["seats"];
    }
}
	$bookedSeats = $bseats[$index2];
	$newSeats = $currSeats - $bookedSeats;
	$bookid = substr($currUser,0,3).substr($currID,0,4).$bookedSeats;
	$sql="INSERT INTO bookings (bookid,username,tour_id,bseats)
	VALUES ('$bookid','$currUser','$currID','$bookedSeats')";
	$sql2="UPDATE tours SET seats = $newSeats WHERE id = '$currID'";
	if($conn->query($sql)==TRUE && $conn->query($sql2)){
			echo "Record added successfully";
	}
	else{
		echo "Record addition failed";
	}
	$index2++;
}			
	$conn->close();
	header("Location: Home.php");

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CheckOut</title>
		<style type="text/css">
		body{
			margin: 0 auto;
			background-image: url(Images/pp.jpg);
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
			margin-right: 520px;
			margin-top: 50px;
			margin-bottom: 50px;
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
			margin-right: 220px;
			margin-left: 215px;
		}
		#nav_wrapper ul li:hover{
			background: #FFA500;
			transition: all 0.45s;
			border-radius: 10px;
			opacity: 0.6;
			filter: alpha (opacity=60);
		}
		.container {
			width: 500px;
			height: 550px;
			text-align: center;
			margin: 0 auto;
			background-color: black;
			opacity: 0.7;
			margin-top: 60px;
			margin-left: 400px;
			border-radius: 10px;
		}
		.container img {
			width: 120px;
			height: 120px;
			margin-top: -60px;
			margin-bottom: 30px;
		}
		input[type="text"]{
			height: 35px;
			width: 150px;
			font-size: 15px;
			margin-bottom: 20px;
			background-color: #fff;
			padding-left: 10px;
			border-radius: 4px;
		}
	
		.btn-login {
			
			padding: 15px 30px;  
			
			opacity: 0.8;
			background-color: #27AE60;
			border: 2px;
			border-bottom: 4px solid #27AE60;
			width: 100px;
			border-radius : 10px;
			margin-bottom: 20px;
			cursor: pointer;
			font-family:"Myriad Pro", "Trebuchet MS", sans-serif;
		}
		a {
			color:#aaa;
			font-family:"Myriad Pro", "Trebuchet MS", sans-serif;
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
			.button {
  border-radius: 7px;
  background-color:red;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 10px;
  width: 130px;
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
	
	.form {
  background: rgba(19, 35, 47, 0.9);
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: #179b77;
  color: #ffffff;
}
.tab-group .active a {
  background: #1ab188;
  color: #ffffff;
}

.tab-content > div:last-child {
  display: none;
}


label {
  position: absolute;
  -webkit-transform: translateY(6px);
          transform: translateY(6px);
  left: 13px;
  color: black;
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}
label .req {
  margin: 2px;
  color: black;
}

label.active {
  -webkit-transform: translateY(50px);
          transform: translateY(50px);
  left: 2px;
  font-size: 14px;
}
label.active .req {
  opacity: 0;
}

label.highlight {
  color: #ffffff;
}


.input{
   font-size: 22px;
  display: block;
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  background: none;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: white;
  border-radius: 0;
  -webkit-transition: border-color .25s ease, box-shadow .25s ease;
  transition: border-color .25s ease, box-shadow .25s ease;
}


.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
.top-row > div:last-child {
  margin: 0;
}
table, th, td {
    border-radius: 2px;
    border: 1px solid black;
   border-collapse: collapse;
    opacity: 0.95;
    font-family:"Myriad Pro", "Trebuchet MS", sans-serif;
margin-top: 40px;

}


th, td {
    padding: 1px;
    text-align: center;

}
th {
    background-color: black;
    color: white;
    width: 100px;
    margin-left: 100px;
    margin-top: 40px;
    height: 1px;
}
tr{
	height: 5px;
}
tr:nth-child(even){
    background-color: #e8e8e8;
}
tr:nth-child(odd){
    background-color: white;
}
			
td{
	background-color: #aaa;
	width: 20px;
}
#scr.scroll {
    
   
    overflow: scroll;
}

p{
	color: #aaa;
	font-family: sans-serif;
	float: left;
	margin-left: 70px; 
	margin-right: 50px;
	
	font-size: 17px;
}	

label {
	color: #aaa;
	font-family: sans-serif;
	margin-left: 455px;
	height: 200px;
	width: 350px;
	padding: 5px;
	border-radius: 5px;
	background-color: orange;
	opacity: 0.6;
	font-size: 20px;
	margin-top: 40px;
}
	
#p1{
		color: black;
	font-family: sans-serif;
	float: left;
	margin-left: 10px; 
	margin-right: 50px;
	
	font-size: 15px;
}
#p2{
	color: #aaa;
	font-family: sans-serif;
	float: left;
	margin-left: 70px; 
	margin-right: 50px;
	
	font-size: 17px;
}
#lb1{
	color: #aaa;
	font-family: sans-serif;
	margin-left: 610px;
	height: 25px;
	width: 200px;
	padding: 5px;
	border-radius: 5px;
	background-color: orange;
	opacity: 0.6;
	font-size: 20px;
	margin-top: 1px;
}

	</style>
</head>
<body>


	
	
<div class="container">

	<img src="Images/ii.png">

	<form action="" method="post" >
	<legend>
	<p> Review you Bookings!</p></legend>
		 <label style="color: white; border: 1px solid white;" id="l1"><p id="p1"></p> </label>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		
		<p id="p2"> Total Fees:</p><label id="lb1" style="color: black;"></label>
		<br>
		<br>
		<br>
		<form method="post" name="Form" onsubmit="" action="">
		<button type="submit" name="confirm" class="button" id="navigate" onclick="alert('Thanks for your time!. . . Your booking has been RESERVED!')" style="background-color: 		#00FF00"  > <span> CONFIRM! </span></button>
		<a href="table.php">
		 <button  type="button" class="button"> <span> Cancel </span></button>
		 </a>
		 </form>
		<br>
		<br>

		
		<span style="color: #aaa; ">Please note 5% tax is added on the final receipt</span>


	</form>
	
</div>

<div>
            <span class="reference">
                <a href="@">Contact us</a>
				<a href="@">Terms</a>
				<a href="@">Developers</a>
				<a href="@">Help</a>
				<a href="@">Cookies</a>
				<a href="@">privacy</a>

            </span>
</div>
<?php 
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="ebtdb"; 
	$conn= new mysqli($servername,$username,$password,$dbname);

	if($conn->connect_error){
		die("Connection failed:". $conn->connect_error);
	}
	$bid = array("CK201718","CS201715","HS201711"); //tempstatic
	$bseats = array("4","2","1"); //tempstatic
	$total = 0;
	//$bid = $_SESSION['bid'];
	//$bseats = $_SESSION['bseats'];
	$currUser = $_SESSION['username'];
	$currSeats = 0;
	$index = 0;
	foreach ($bid as $currID){
	$bookedSeats = $bseats[$index];
	$sql = "SELECT seats, price FROM tours WHERE id = '$currID'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
         $currSeats = $row["seats"];
         $currPrice = $row["price"];
    }
}
	$recentTotal = $currPrice * $bseats[$index];
	$total = $total + $recentTotal;
	echo "<script>document.getElementById('p1').innerHTML+= 'You are booking TourID '+'$currID'+' reserving '+'$bookedSeats'+' seats'+' with a price of '+'$currPrice'+' per seat costing '+'$recentTotal'+' Pounds<br><br>'</script>";
	$index++;
}
	$final = 1.05*$total;
	echo "<script>document.getElementById('lb1').innerHTML = '$final'+' Pounds'</script>";	
?>
</body>
</html>