<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	include "database_connector.php";
	$kid = $_POST['k_id'];
	$ans = $_POST['ans'];
	$temp =mysqli_query($con, "SELECT * FROM dictionary WHERE id='$kid'");
	if($temp) {
		$row = mysqli_fetch_array($temp);
		if($row[5] == $ans) {
			echo "<p class='text-success'> Perfect answer! </p>";
		}
		else if(strpos($row[5], $ans) !== false) {
			echo "<p class='text-warning'> Good Job! </p>";
		}
		else {
			echo "<p class='text-danger'> Wrong " . $row[5] . " is the right answer </p>";
		}
	}
	
}
?>
