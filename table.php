<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <script src="jquery-3.1.1.js"></script>
 <script src="jquery_cookie.js" type="text/javascript"></script>
<?php
			//Connect to the DB

			$flag = $_SESSION['flag'];
      if($flag=="true"){
			$tfrom = $_SESSION['from'];
			$tto = $_SESSION['to'];
			$tdate = $_SESSION['date'];
      }
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
			width: 900px;
			height: 580px;
			text-align: center;
			margin: 0 auto;
			background-color: black;
			opacity: 0.7;
			margin-top: 50px;
			margin-left: 200px;
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
.hide{
	display:none;
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
	     <th> Date </th>
         <th> No. of Seats </th>
        <th> Book </th>
        <th id="adminized1" class="hide"> Edit </th>
        <th id="adminized2" class="hide"> Delete </th>
    </tr>


</table>
<button  type="" onclick="window.location='Home.php'" name="submit" class="button" style="background-color: #006400" > <span> Back </span></button>
<a ><button  onclick="pre_Checkout()" type="submit" name="submit" class="button"  style=" background-color: blue;" > <span> SUBMIT! </span></button></a>
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
        if(isset($_COOKIE['IDs_Cookie'])){
        $_SESSION['bid']=json_decode($_COOKIE['IDs_Cookie']);
        $_SESSION['bseats']=json_decode($_COOKIE['Reserved_Cookie']);
        echo"<script>
        Cookies.remove('IDs_Cookie');
        location.href ='checkOut.php';
        </script>";
        }
        if(isset($_COOKIE['cookieName'])){
        $deletequery= "DELETE from tours where id ='".$_COOKIE['cookieName']."'";
        if($_COOKIE['cookieName']!="nothing"){
        $result=$conn->query($deletequery);

        if(!$result)
        {
              //echo $conn->error;

        }
        echo"<script>document.cookie ='cookieName=nothing'</script>";
          echo "<script>location.reload()</script>";
      }
    }
        if($flag=="true"){

        $sql="SELECT * from tours where  tdate = '".$tdate."' && tfrom='".$tfrom."' && tto ='".$tto."'";
        }
        else{

				$sql="SELECT * from tours";
        }

				$result = $conn->query($sql);
				if($result->num_rows>0){

					while($row=$result->fetch_assoc()){
						$str="<tr><td>".$row['id']."</td><td>"
						.$row['tfrom']."</td><td>"
						.$row['tto']."</td><td>"
						.$row['price']."</td>"
            ."<td>".$row['tdate']."</td>"
            ."<td>".$row['seats']."</td>"
						."<td> <input class=slider data-tid=".$row['id']." type=number min=0 max=".$row['seats']." step=1 value=0 style=width:40px; required ></td>"
            ."<td class=hide id=adminized><a href=Admin\'s_form.html><button class=button type=submit name=submit><span>Edit</span> </button></a> </td>"
						."<td class=hide id=adminized> <button class=button onclick=myfunction(this) type=submit name=submit style=background-color:red; id=".$row['id']."><span>Delete</span> </button> </td>"
						."</tr>";
		  		echo"<script>$('#table').append('$str')</script>";
				}
            $deletequery="DELETE from tours WHERE tid='".$row['id']."'";
				}
        echo"<script> function myfunction(param){
       document.cookie = 'cookieName='+param.id;
      location.reload();
      }</script>";

        //echo "<script> function myfunction(param){'.$conn->query('.$deletequery.')'}</script>";

		?>
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
    		echo "<script>document.getElementById('adminized1').classList.remove('hide')</script>";
    		echo "<script>document.getElementById('adminized2').classList.remove('hide')</script>";
    		echo "<script>$('td').removeClass('hide')</script>";
    	}


		?>
<script>
function pre_Checkout(){
  var tour_ids=[];
  var reserved=[];
  $(".slider").each(function(){
   var value=$(this).val();
   if(value>0){
     console.log($(this).data('tid')+"  "+ value);
     tour_ids.push($(this).data('tid'));
     reserved.push(value);
   }
   Cookies.set('IDs_Cookie', JSON.stringify(tour_ids));
   Cookies.set('Reserved_Cookie', JSON.stringify(reserved));
   location.reload();
});
/*  $("td").each(function() {
    console.log($(this).attr("id"));

    // compare id to what you want
});*/
}
</script>
</body>
</html>
