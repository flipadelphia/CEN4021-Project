<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	include "database_connector.php";
	$kid = $_POST['k_id'];
	$ans = $_POST['ans'];
	$temp =mysqli_query($con, "SELECT * FROM dictionary WHERE id='$kid'");
	if($temp) {
		$row = mysqli_fetch_array($temp);
		$h = array();
		$h = explode("/", $row[1]);
		$flag = 0;
		for($i = 0; $i < count($h); $i++) {
			if($h[$i] == $ans) {
				echo "<p class='text-success'> Perfect Answer! </p>";
				$flag = 1;
			}
		}
		$v = array();
		$v = explode("/", $row[3]);
		for($j = 0; $j < count($v); $j++) {
			if ($v[$j] == $ans) {
				echo "<p class='text-success'> Perfect Answer! </p>";
				$flag = 1;
			}
		}
		/*else if(strpos($row[1], $ans) !== false) {
			echo "<p> Good Job! </p>";
		}
		else if(strpos($row[3], $ans) !== false) {
			echo "<p> Good Job! </p>";
		}*/
		if($flag == 0) {
			if($row[1] != "") {
			echo "<p class='text-danger'> Wrong " . $row[1] . " is the right answer </p>";
			}
			else {
			echo "<p class='text-danger'> Wrong " . $row[3] . " is the right answer </p>";
			}
		}
	}
	
}
?>
