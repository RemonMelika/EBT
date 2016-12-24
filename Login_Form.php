<!DOCTYPE html>
<html>
<head>
	<title> Login Form </title>
	<?php
	//Connect to the DB
	if(isset($_POST["username"])){
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="ebtdb"; //TODO :CHANGE to the real name;
	$conn= new mysqli($servername,$username,$password,$dbname);
	if($conn->connect_error){
		die("Connection failed:". $conn->connect_error);
	}

	//Login Check
	if(isset($_POST["username"])){
	$username=$_POST["username"];
	$password=$_POST["password"];

	$sql="SELECT * from users where username = '$username' ";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		$row=$result->fetch_assoc();
		if( $row['password'] == $password){
		//Logged in
			echo "Signed IN";
			if($row['admin']){
			echo "<script>
						console.log('DAKHAL');
						document.getElementById('managelink').style.display='unset';
						</script>";
					}
					//weither admin or normal user but the username and pass are correct
					$conn->close();
					header("Location: Home.html");
		}
		else{
			echo "Incorrect Password";
		}

	}
	else{
		echo "Incorrect Username";
	}


	}
	$conn->close();
}
	 ?>

	<style type="text/css">
		body{
			margin: 0 auto;
			background-image: url(Images/ss.jpg);
			background-repeat: no-repeat;
			background-size: 100% 720px;
		}
		.container {
			width: 500px;
			height: 400px;
			text-align: center;
			margin: 0 auto;
			background-color: black;
			opacity: 0.7;
			margin-top: 80px;
			border-radius: 10px;
		}
		.container img {
			width: 120px;
			height: 120px;
			margin-top: -60px;
			margin-bottom: 30px;
		}
		input[type="text"],input[type="password"]{
			height: 45px;
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

	</style>
</head>
<body>
<h1 class="title">Tourism</h1>
<div class="container">
	<img src="Images/q.png">
	<form method="post" name="Form" onsubmit="" action="">
		<div class="form-input">
			<input type="text" name="username" placeholder="Enter Username" required="">
		</div>
		<div class="form-input">
			<input type="password" name="password" placeholder="Enter Password" required="">
		</div><br>

				<button class="button" type="submit" name="submit"><span>Sign In</span></button> <br>

		<br>

		<a href="@">Forget Password?</a> <br>
		<a href="Reg_form.html">Sign Up</a>



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
