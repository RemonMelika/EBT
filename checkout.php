<?php
session_start();
?>

<?php 
$bid = array();
$bseats = array();
$bid = $_SESSION['bid'];
$bseats = $_SESSION['bseats'];
$currUser = $_SESSION['username'];
for(int i=0; i<count($_SESSION['array']); i++){
$currSeats = "SELECT seats FROM tours WHERE id = $bid[i]";

if($bseats[i] < $currSeats)
$newSeats = $currSeats - $bseats[i];

$sql ="INSERT INTO bookings (username, tour_id, bseats)
VALUES('$currUser', '$bid[i]', '$bseats[i]')
UPDATE tours SET seats = $newSeats WHERE id = $bid[i]";

if($conn->query($sql)==TRUE){
		$conn->close();
	}
	else{
		echo "Booking Tour".$bid[i]." has failed";
	}
}
header("Location: Home.php");
?>