<!DOCTYPE html>
<html>
<head>
	<?php
	if(isset($_POST['submit'])){
//	echo "php started";
	//connection to DB
$servername="localhost";
	$username="root";
	$password="";
	$dbname="ebtdb"; //TODO :CHANGE to the real name;
	$conn= new mysqli($servername,$username,$password,$dbname);


	if($conn->connect_error){
		die("Connection failed:". $conn->connect_error);
	}


	//echo "hello". " ";
	$username= $_POST["username"];
	$password= $_POST["password"];
	$mobileno=$_POST["mobile"];
	$birthday=$_POST["day"];
	$birthmonth=$_POST["Month"];
	$birthyear=$_POST["year"];
	$birthdate=$birthyear.'-'.$birthmonth.'-'.$birthday;
	$email=$_POST["E-mail"];
	//echo $username . " " . $password . " " .$mobileno . " " . $birthday."/".$birthmonth."/".$birthyear. " ". $email ."<br>" .$birthdate."<br>";



	$sql="INSERT INTO users (username,password,birthdate,mobile_number,email)
	VALUES ('$username','$password','$birthdate','$mobileno','$email')";

	if($conn->query($sql)==TRUE){
		$conn->close();
		header("Location: Login_Form.php");
			echo "Record added successfully";
	}
	else{
		//echo "ERROR: ".$sql . "<br>". $conn->error;
		echo "The Username you entered is already taken.";
	}


	$conn->close();
}
	 ?>
	<title> Registration Form </title>


	<style type="text/css">
		body{
			margin: 0 auto;
			background-image: url(Images/ss.jpg);
			background-repeat: no-repeat;
			background-size: 100% 720px;
		}
		.container {
			width: 500px;
			height: 520px;
			text-align: center;
			margin: 0 auto;
			background-color: black;
			opacity: 0.7;
			margin-top: 30px;
			border-radius: 10px;
		}
		.container img {
			width: 120px;
			height: 120px;
			margin-top: -60px;
			margin-bottom: 30px;
		}
		input[type="password"]{
			height: 25px;
			width: 300px;
			font-size: 18px;
			margin-bottom: 20px;
			background-color: #fff;
			padding-left: 10px;
			border-radius: 4px;
		}


		.button {
  border-radius: 7px;
  background-color: green;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
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
			h1.title{
				text-indent:-9000px;
				background:transparent url(Images/u.png) no-repeat top left;
				width:433px;
				height:59px;
			}
			#mm{
				text-decoration: none;
			}

	</style>
</head>

<body>
<h1 class="title">Tourism</h1>
<div class="container">
	<img src="Images/r.png">
	<form method="post" name="Form" onsubmit="" action="">
		<div class="form-input">
			<input type="text" name="username" placeholder="Enter Username" style=" height: 25px;
			width: 300px;
			font-size: 18px;
			margin-bottom: 20px;
			background-color: #fff;
			padding-left: 10px;
			border-radius: 4px;
			" required="">
		</div>
		<div class="form-input">
			<input type="password" name="password" placeholder="Enter Password" required="">
		</div>
		<div class="form-input">
			<input type="password" name="password" placeholder="Confirm Password" required="">
		</div>
		<div class="birthday">
			<input type="text" name="day" placeholder="Day" style=" height: 25px;
			width: 70px;
			font-size: 18px;
			margin-bottom: 20px;
			background-color: #fff;
			padding-left: 10px;
			border-radius: 4px;
			float: left;
			margin-left: 92px; " required="">
		</div>
		<div class="birthday">
			<input type="text" name="Month" placeholder="Month" style=" height: 25px;
			width: 70px;
			font-size: 18px;
			margin-bottom: 20px;
			background-color: #fff;
			padding-left: 10px;
			border-radius: 4px;
			float: left;
			margin-left: 32px;" required="">
		</div>
		<div class="birthday">
			<input type="text" name="year" placeholder="Year" style="height: 25px;
			width: 70px;
			font-size: 18px;
			margin-bottom: 20px;
			background-color: #fff;
			padding-left: 10px;
			border-radius: 4px;
			float: left;
			margin-left: 32px;" required="">
		</div>
		<div class="birthday">
			<input type="text" name="mobile" placeholder="Mobile Number" style="height: 25px;
			width: 300px;
			font-size: 18px;
			margin-bottom: 20px;
			background-color: #fff;
			padding-left: 10px;
			border-radius: 4px;" required="">
		</div>
		<div class="birthday">
			<input type="text" name="E-mail" placeholder="E-mail address" style="height: 25px;
			width: 300px;
			font-size: 18px;
			margin-bottom: 20px;
			background-color: #fff;
			padding-left: 10px;
			border-radius: 4px;" required="">
		</div>


				<button class="button" type="submit" name="submit"><span>SignUp</span></button> <br>

		<br>

		 <a id="mm">Already have an account?</a> <a href="Login_Form.html"> Sign In</a>



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
