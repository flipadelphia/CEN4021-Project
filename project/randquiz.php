<html>
<body>
    <h2> Quiz Time! </h2>
<form action="quiz.php" method="post">
Grade Level: <select name="gradelevel">
<option value="1"> 1st </option>
<option value="2"> 2nd </option>
<option value="3"> 3rd </option>
<option value="4"> 4th </option>
<option value="5"> 5th </option>
<option value="6"> 6th </option>
<option value="7"> 7th </option>
<option value="8"> 8th </option>
<option value="9"> 9th </option>
<option value="10"> 10th </option>
<option value="11"> 11th </option>
<option value="12"> 12th </option>
</select> <br><br>
<input type="submit" class="btn btn-sm btn-primary" name="grades" value="Grade Select">
<input type="submit" class="btn btn-sm btn-success" name="random" value="Random">
</form>


<?php
include "database_connector.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['grades'])) {
		echo "I Win\n";
		$grade = $_POST['gradelevel'];
		//echo "$grade <br>";
		$result = mysqli_query($con,"SELECT count(*) FROM kanjiinfo WHERE grade_level BETWEEN 1 AND
		$grade");
		$num_rows = mysqli_fetch_array($result);
		$kanji_picks = array();
		$rands = array();
		for($k = 0; $k<10; $k++) {
			$my_rand = rand(1, $num_rows[0]);
			array_push($rands,$my_rand);
		}
		echo "<br>";
		sort($rands);
		for($k = 0; $k<10; $k++) {
		//	echo $rands[$k] . " ";
		}
		//echo "<br>";
		if($result = mysqli_query($con,"SELECT * FROM kanjiinfo WHERE grade_level BETWEEN 1 and
			$grade")){
			$count = 1;
			$arrayindex = 0;
			while(($rows = mysqli_fetch_array($result)) && ($count<$num_rows[0])) {
				if($count == $rands[$arrayindex]) {
					array_push($kanji_picks,$rows[1]);
					$arrayindex++;
		//			echo "$rows[1] ";
					if($arrayindex == 10) {
		//			echo "broke it<br>";
						break;
					}
				}
				$count++;
			}
		//	echo count($kanji_picks) . "<br>";
			}
		if(count($kanji_picks) == 10) {
		//	echo count($kanji_picks) . "<br>";
		$result = mysqli_query($con,"SELECT * FROM dictionary where kanji_word like
			'%$kanji_picks[0]%' OR kanji_word like '%$kanji_picks[1]%' OR 
			kanji_word like '%$kanji_picks[2]%' OR kanji_word like '%$kanji_picks[3]%' 
			OR kanji_word like '%$kanji_picks[4]%' OR kanji_word like '%$kanji_picks[5]%' 
			OR kanji_word like '%$kanji_picks[6]%' OR kanji_word like '%$kanji_picks[7]%' 
			OR kanji_word like '%$kanji_picks[8]%' OR kanji_word like '%$kanji_picks[9]%'");
		}
		else if(count($kanji_picks) == 9) {
		//	echo count($kanji_picks) . "<br>";
		$result = mysqli_query($con,"SELECT * FROM dictionary where kanji_word like
			'%$kanji_picks[0]%' OR kanji_word like '%$kanji_picks[1]%' OR 
			kanji_word like '%$kanji_picks[2]%' OR kanji_word like '%$kanji_picks[3]%' 
			OR kanji_word like '%$kanji_picks[4]%' OR kanji_word like '%$kanji_picks[5]%' 
			OR kanji_word like '%$kanji_picks[6]%' OR kanji_word like '%$kanji_picks[7]%' 
			OR kanji_word like '%$kanji_picks[8]%'");
		}
		else if(count($kanji_picks) == 8) {
		//	echo count($kanji_picks) . "<br>";
		$result = mysqli_query($con,"SELECT * FROM dictionary where kanji_word like
			'%$kanji_picks[0]%' OR kanji_word like '%$kanji_picks[1]%' OR 
			kanji_word like '%$kanji_picks[2]%' OR kanji_word like '%$kanji_picks[3]%' 
			OR kanji_word like '%$kanji_picks[4]%' OR kanji_word like '%$kanji_picks[5]%' 
			OR kanji_word like '%$kanji_picks[6]%' OR kanji_word like '%$kanji_picks[7]%'");
		}
		else if(count($kanji_picks) == 7) {
		//	echo count($kanji_picks) . "<br>";
		$result = mysqli_query($con,"SELECT * FROM dictionary where kanji_word like
			'%$kanji_picks[0]%' OR kanji_word like '%$kanji_picks[1]%' OR 
			kanji_word like '%$kanji_picks[2]%' OR kanji_word like '%$kanji_picks[3]%' 
			OR kanji_word like '%$kanji_picks[4]%' OR kanji_word like '%$kanji_picks[5]%' 
			OR kanji_word like '%$kanji_picks[6]%'");
		}
		else if(count($kanji_picks) == 6) {
		//	echo count($kanji_picks) . "<br>";
		$result = mysqli_query($con,"SELECT * FROM dictionary where kanji_word like
			'%$kanji_picks[0]%' OR kanji_word like '%$kanji_picks[1]%' OR 
			kanji_word like '%$kanji_picks[2]%' OR kanji_word like '%$kanji_picks[3]%' 
			OR kanji_word like '%$kanji_picks[4]%' OR kanji_word like '%$kanji_picks[5]%'");
		}
		else if(count($kanji_picks) == 5) {
		//	echo count($kanji_picks) . "<br>";
		$result = mysqli_query($con,"SELECT * FROM dictionary where kanji_word like
			'%$kanji_picks[0]%' OR kanji_word like '%$kanji_picks[1]%' OR 
			kanji_word like '%$kanji_picks[2]%' OR kanji_word like '%$kanji_picks[3]%' 
			OR kanji_word like '%$kanji_picks[4]%'"); 
		}
		else if(count($kanji_picks) == 4) {
		//	echo count($kanji_picks) . "<br>";
		$result = mysqli_query($con,"SELECT * FROM dictionary where kanji_word like
			'%$kanji_picks[0]%' OR kanji_word like '%$kanji_picks[1]%' OR 
			kanji_word like '%$kanji_picks[2]%' OR kanji_word like '%$kanji_picks[3]%' "); 
		}
		else if(count($kanji_picks) == 3) {
		//	echo count($kanji_picks) . "<br>";
		$result = mysqli_query($con,"SELECT * FROM dictionary where kanji_word like
			'%$kanji_picks[0]%' OR kanji_word like '%$kanji_picks[1]%' OR 
			kanji_word like '%$kanji_picks[2]%'"); 
		}
		else if(count($kanji_picks) == 2) {
		//	echo count($kanji_picks) . "<br>";
		$result = mysqli_query($con,"SELECT * FROM dictionary where kanji_word like
			'%$kanji_picks[0]%' OR kanji_word like '%$kanji_picks[1]%'");
		}
		else{
		//	echo count($kanji_picks) . "<br>";
		$result = mysqli_query($con,"SELECT * FROM dictionary where kanji_word like
			'%$kanji_picks[0]%'");
		}
		
		if($result){
			$num_rows = mysqli_num_rows($result);
		//	echo "$num_rows <br>";
			$rands2 = array();
			for($j=0;$j<10;$j++) {
				$my_rand = rand(1,$num_rows);
				array_push($rands2,$my_rand);
			}
			sort($rands2);
			$count = 1;
			$arrayindex=0;
			$words = array();
			while(($rows = mysqli_fetch_array($result)) && ($count<$num_rows)) {
				if($count == $rands2[$arrayindex]) {
					array_push($words,$rows[1]);
					$arrayindex++;
					echo "$rows[1] $rows[3] $rows[5]<br>";
					if($arrayindex == 10) {
						break;
					}
				}
				$count++;
			}
		}
	}
	if(isset($_POST['random'])) {
		echo "I still win\n";
		$answers = array();
		$problems = array();
		$kanji = array();
		$temp = mysqli_query($con,"SELECT count(*) FROM dictionary WHERE id > 0");
		$num_of_entries = mysqli_fetch_array($temp);
		echo $num_of_entries[0] . "\n";
		$j = 0;
		for($j; $j < 5; $j++) {
			$my_rand = rand(1,$num_of_entries[0]);
			$temp = mysqli_query($con,"SELECT * FROM dictionary WHERE id=$my_rand");
			$temp2 = mysqli_fetch_array($temp);
			array_push($answers,"$temp2[5]");
			array_push($problems,"$temp2[3]");
			array_push($kanji,"$temp2[1]");
		}
		$i = 0;
		for($i; $i < 5; $i++) {
			$my_rand = rand(1,$num_of_entries[0]);
			$temp = mysqli_query($con,"SELECT * FROM dictionary WHERE id=$my_rand");
			$temp2 = mysqli_fetch_array($temp);
			array_push($answers,"$temp2[3]");
			array_push($problems,"$temp2[5]");
			array_push($kanji,"$temp2[1]");
		}
		$k = 0;
		for($k; $k < 10; $k++) {
			$temp = $problems[$k];
			$temp2 = $answers[$k];
			if($k < 5) {
				if($kanji[$k] != null) {
					$temp3 = $kanji[$k];
					echo "$temp3/";
				}
				echo "$temp $temp2<br>";
			}
			else {
				if($kanji[$k] != null) {
					$temp3 = $kanji[$k];
					echo "$temp3/";
				}
				echo "$temp2 $temp<br>";
			}
		}

	}
}
?>
</body>
</html>
