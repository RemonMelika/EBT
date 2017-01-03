<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <script src="jquery-3.1.1.js"></script>
<?php
			//Connect to the DB
			$tfrom = $_SESSION['from'];
			$tto = $_SESSION['to'];
			$tdate = $_SESSION['date'];
			$_SESSION['bid']=array();
			$_SESSION['bseats']=array();
			$servername="localhost";
			$username="root";
			$password="";
			$dbname="ebtdb"; //TODO :CHANGE to the real name;
			$conn= new mysqli($servername,$username,$password,$dbname);
			if($conn->connect_error){
				die("Connection failed:". $conn->connect_error);
			$conn->close();
		}	
?>
	<title>Tours' form</title>
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
			margin-top: 20px;
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
			width: 700px;
			height: 580px;
			text-align: center;
			margin: 0 auto;
			background-color: black;
			opacity: 0.7;
			margin-top: 50px;
			margin-left: 300px;
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
  width: 100px;
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
table, th, td {
    border-radius: 2px;
    border: 1px solid black;
   border-collapse: collapse;
    opacity: 0.95;
    font-family:"Myriad Pro", "Trebuchet MS", sans-serif;


}


th, td {
    padding: 5px;
    text-align: center;

}
th {
    background-color: black;
    color: white;


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
}
#scr.scroll {
    
   
    overflow: scroll;
}


</style>
</head>
<body>


	

<div  class="container" style="overflow: scroll;" >

	<img src="Images/oo.png" style="padding-top: 60px;">
	<table id="table" style="width: 500px; color: black; " align="center" style="overflow: scroll;">
    <tr>
        <th> Tour </th>
        <th> From </th>
        <th> To </th>
        <th> Price (EGP) </th>
         <th> No. of Seats </th>
        <th> Book </th>
        <th> Edit </th>
        <th> Delete </th>
    </tr>
    <tr>
        <td>1</td>
        <td>Cairo</td>
        <td>Gouna</td>
        <td>100</td>
        <td> 48</td>
        <td><input type="number" min="1" max="30" step="1" value="0" style="width: 40px;" required ></td>
        <td><a href="Admin's_form.html"><button class="button" type="submit" name="submit"><span>Edit</span> </button></a> </td>
        <td> <button class="button" type="submit" name="submit" style="background-color: red;"><span>Delete</span> </button> </td>
    </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
     
</table>
<button  type="submit" name="submit" class="button"  style=" background-color: blue;" > <span> SUBMIT! </span></button>
<br>

	<form>
	


		

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
				$sql="SELECT * from tours";
				$result = $conn->query($sql);
				if($result->num_rows>0){
					$row=$result->fetch_assoc();
					while($row=$result->fetch_assoc()){
						$str="<tr><td>".$row['id']."</td><td>"
						.$row['tfrom']."</td><td>"
						.$row['tto']."</td><td>"
						.$row['price']."</td>"
						."<td><input type=radio name=book value=Book> </td><td><a href=Admin\'s_form.html><button class=button type=submit name=submit><span>Edit</span> </button></a> </td>"
						."<td> <button class=button type=submit name=submit style=background-color:red;><span>Delete</span> </button> </td>".
						
						"</tr>";
		  		echo"<script>$('#table').append('$str')</script>";
			//	echo "<script>$('#table').append('<tr><td>'.$row['id'].'</td><td>'.$row['tfrom'].'</td><td>'.$row['tto'].'</td><td>'.$row['price'].'</td></tr>')</script>";
				}
				}
				$conn->close();
		?>

</body>
</html>