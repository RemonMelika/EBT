<!DOCTYPE html>
<html>
<head>
<?php
	if(isset($_POST['submit'])){
$servername="localhost";
	$username="root";
	$password="";
	$dbname="ebtdb"; //TODO :CHANGE to the real name;
	$conn= new mysqli($servername,$username,$password,$dbname);

	if($conn->connect_error){
		die("Connection failed:". $conn->connect_error);
	}

	$from= $_POST["from"];
	$to= $_POST["to"];
	$date= $_POST["date"];
	$datefinal=str_replace("/","-",$date);	
	$price=$_POST["price"];
	$seats=$_POST["seats"];
	$id = substr($from,0,1).substr($to,0,1).str_ireplace("/","",$date);


	$sql="INSERT INTO tours (id,tfrom,tto,tdate,price,seats)
	VALUES ('$id','$from','$to','$datefinal','$price','$seats')";

	if($conn->query($sql)==TRUE){
		$conn->close();
		header("Location: Home.html");
			echo "Record added successfully";
	}
	else{
		echo "Record addition failed";
	}


	$conn->close();
}
?>
	<title>Admin's form</title>
		<style type="text/css">
		body{
			margin: 0 auto;
			background-image: url(Images/ss.jpg);
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
		.container {
			width: 500px;
			height: 400px;
			text-align: center;
			margin: 0 auto;
			background-color: black;
			opacity: 0.7;
			margin-top: 80px;
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
  background-color: green;
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
			
		
	</style>
</head>
<body>


	
	<div id="nav_wrapper"><br>
				<ul>
					<li><a href="User.html" >Home</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Account</a></li>
					<li><a href="#">Service</a></li>
					
				</ul>
			
			</div>
<div class="container">

	<img src="Images/o.png">

	<form method="post" name="Form" onsubmit="" action="">
		<div class="form-input">
			<input type="text" name="from" placeholder="From" style="margin-right: 20px;" required=""> <input type="text" name="to" placeholder="To" required="">
		</div>
		<div class="form-input">
			<input type="text" name="date" placeholder="YY/MM/DD" style="margin-right: 20px;" required=""> <input type="text" name="price" placeholder="Price" required="">
		</div>
		<div class="form-input">
			<input type="text" name="seats" placeholder="Number of seats" required=""> 
		</div>
	<br>
		<button class="button" type="submit" name="submit"><span>Add tour</span></button> 
		

		

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

</body>
</html>