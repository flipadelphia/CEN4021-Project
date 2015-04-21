<?php
	$k_id = $_POST['k_id'];
	$ans = $_POST['ans'];
	$que = $_POST['que'];
	/*echo $k_id;
	echo "<br>";
	echo $ans;
	echo "<br>";
	echo $que;*/
	include "database_connector.php";
	$temp = mysqli_query($con,"SELECT * FROM kanjiinfo WHERE grade_level > 0");
	if($temp) {
		$kanji = array();
		$sc = array();
		$meanings = array();
		$readings = array();
		while($row = mysqli_fetch_array($temp)){
			array_push($kanji, $row[1]);
			array_push($sc, $row[4]);
			array_push($meanings, $row[6]);
			array_push($readings, $row[5]);
		}	
	//	echo count($kanji);
		echo "<br>";
	//	echo count($sc);
	}
	$num = rand(0, (count($kanji)-1));
//	echo $num;
	$num2 = rand(1, 3);
	echo "<div class='col-sm-4'>";
	if($que == 1) {
		if($ans == $sc[$k_id]){
			echo "<p class='text-success'>" . $kanji[$k_id] . "</p>";
			echo "<h4 class='text-success'> well done </h4>";
		}
		else {
			echo "<p class='text-danger'>" . $kanji[$k_id] . "</p>";
			echo "<h4 class='text-danger'>incorrect, " . $sc[$k_id] . " is the right answer.</h4>";
		}
	}
	else if($que == 2) {
		if(strpos($meanings[$k_id],$ans) !== false) {
			echo "<p class='text-success'>" . $kanji[$k_id] . "</p>";
			echo "<h4 class='text-success'>well done</h4>";
		}
		else {
			echo "<p class='text-danger'>" . $kanji[$k_id] . "</p>";
			echo "<h4 class='text-danger'>incorrect, " . $meanings[$k_id] . " is the right answer.</h4>";
		}
	}
	else {
		if(strpos($readings[$k_id],$ans) !== false) {
			echo "<p class='text-success'>" . $kanji[$k_id] . "</p>";
			echo "<h4 class='text-success'> well done </h4>";
		}
		else {
			echo "<p class='text-danger'>" . $kanji[$k_id] . "</p>";
			echo "<h4 class='text-danger'>incorrect, " . $readings[$k_id] . " is the right answer.</h4>";
		}
	}
	echo "</div>";
?>
