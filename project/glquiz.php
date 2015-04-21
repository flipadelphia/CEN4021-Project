<!--doctype html-->
<html>
<meta charset="utf8">
<head><title>Kanji Tools</title>
<link href="http://fonts.googleapis.com/css?family=Lobster" rel"stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/mycss.css">
<meta name="viewpoint" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"> </script>
<script>

$(document).ready(function(){

	$("#f1").submit(function(){
		var x = document.getElementById("answer1").value;
		if(x === "") {
			return false;
		}
		var y = document.getElementById("answer1").name;
		$.post("grade_eng.php", {k_id: y, ans: x}, function(data){
			$('#h').html(data);	
		});
	//	$.post("newquest.php", function(data) {
	//		$('#question').html(data);
//	});
		return false;
	});
	$("#f2").submit(function(){
		var x1 = document.getElementById("answer2").value;
		if(x1 === "") {
			return false;
		}
		var y1 = document.getElementById("answer2").name;
		$.post("grade_eng.php", {k_id: y1, ans: x1}, function(data){
			$('#h1').html(data);	
		});

		return false;
	});
	$("#f3").submit(function(){
		var x2 = document.getElementById("answer3").value;
		if(x2 === "") {
			return false;
		}
		var y2 = document.getElementById("answer3").name;
		$.post("grade_eng.php", {k_id: y2, ans: x2}, function(data){
			$('#h2').html(data);	
		});
		return false;
	});
	$("#f4").submit(function(){
		var x3 = document.getElementById("answer4").value;
		if(x3 === "") {
			return false;
		}
		var y3 = document.getElementById("answer4").name;
		$.post("grade_eng.php", {k_id: y3, ans: x3}, function(data){
			$('#h3').html(data);	
		});
		return false;
	});
	$("#f5").submit(function(){
		var x4 = document.getElementById("answer5").value;
		if(x4 === "") {
			return false;
		}
		var y4 = document.getElementById("answer5").name;
		$.post("grade_eng.php", {k_id: y4, ans: x4}, function(data){
			$('#h4').html(data);	
		});
		return false;
	});
	$("#f6").submit(function(){
		var x5 = document.getElementById("answer6").value;
		if(x5 === "") {
			return false;
		}
		var y5 = document.getElementById("answer6").name;
		$.post("grade_jap.php", {k_id: y5, ans: x5}, function(data){
			$('#h5').html(data);	
		});
		return false;
	});
	$("#f7").submit(function(){
		var x6 = document.getElementById("answer7").value;
		if(x6 === "") {
			return false;
		}
		var y6 = document.getElementById("answer7").name;
		$.post("grade_jap.php", {k_id: y6, ans: x6}, function(data){
			$('#h6').html(data);	
		});
		return false;
	});
	$("#f8").submit(function(){
		var x7 = document.getElementById("answer8").value;
		if(x7 === "") {
			return false;
		}
		var y7 = document.getElementById("answer8").name;
		$.post("grade_jap.php", {k_id: y7, ans: x7}, function(data){
			$('#h7').html(data);	
		});
		return false;
	});
	$("#f9").submit(function(){
		var x8 = document.getElementById("answer9").value;
		if(x8 === "") {
			return false;
		}
		var y8 = document.getElementById("answer9").name;
		$.post("grade_jap.php", {k_id: y8, ans: x8}, function(data){
			$('#h8').html(data);	
		});
		return false;
	});
	$("#ff").submit(function(){
		var x9 = document.getElementById("answer10").value;
		if(x9 === "") {
			return false;
		}
		var y9 = document.getElementById("answer10").name;
		$.post("grade_jap.php", {k_id: y9, ans: x9}, function(data){
			$('#h9').html(data);	
		});
	//	var y9 = this.name;
		return false;
	});
});
</script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
 <a class="navbar-brand newfont"><font face="mv boli">Kanji Tools</font></a>
    </div>
      <ul class="nav navbar-nav pull-right">
      <li><a href="index.html">Home</a></li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" > Kanji Search <span class="caret"></span></a>
	  <ul class="dropdown-menu" role="menu">
            <li><a href="meaning.php">Search by Meaning</a></li>
            <li><a href="hiragana.php">Search by Hiragana</a></li>
            <li><a href="byradical.php">Search by Radical</a></li>
            <li class="active"><a href="stroke.php">Search by Stroke Count</a></li>
	  </ul>
      </li> 
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown"> Word Search <span class="caret"></span></a>
	  <ul class="dropdown-menu" role="menu">
            <li><a href="etoj.php">Search by English</a></li>
            <li><a href="jtoe.php">Search by Japanese</a></li>
	  </ul>
      </li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown"> Study Area <span class="caret"></span></a>
	  <ul class="dropdown-menu" role="menu">
            <li class="active"><a href="quiz.php">Take a Quiz</a></li>
            <li><a href="flashcard.php">Make some Flashcards</a></li>
	  </ul>
      </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
 <div class="row">
  <div class="col-sm-3 col-md-2 sidebar">
   <ul class="nav nav-sidebar">
    <li> Quiz Time! </li>
    <li> <a href=glquiz.php> Grade Level Quiz </a> </li>
    <li> <a href=randquiz.php> Random Words </a> </li>
    <li> <a href=bykanjiquiz.php> Specific Kanji </a> </li>
    <li> <a href=indikanjiquiz.php> Random Kanji </a> </li>
    <li> <a href=glindikanjiquiz.php> Kanji By Grade Level </a> </li>
   </ul>
   <ul class="nav nav-sidebar">
    <br>
    <li> External Links </li>
    <li> <a href="http://www.kanjialive.com"> Kanji Alive </a> </li>
    <li> <a href="http://www.edrdg.org/jmdict/j_jmdict.html"> JMDict </a> </li>
   </ul>
   <ul class="nav nav-sidebar">
    <li> <a> </a> </li>
    <li> <a href="index.html"> Kanji Tools </a> </li>
    <li> <a href="flipadelphia.html"> Flipadelphia </a> </li>
   </ul>
  </div>
  <div class="col-sm-9 ">
    <h1> Grade Level Quiz </h1>
      <p> This quiz type lets you pick a grade level of kanji you wish to learn based on 1st - 12th grade levels. </p>
      <form action="glquiz.php" method="post">
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
     </form>
<?php
include "database_connector.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['grades'])) {
		//echo "I Win\n";
		$grade = $_POST['gradelevel'];
		//echo "$grade <br>";
		$result = mysqli_query($con,"SELECT count(*) FROM kanjiinfo WHERE grade_level BETWEEN 1 AND
		$grade");
		$num_rows = mysqli_fetch_array($result);
		$kanji_picks = array();
		$temp_array = array();
		$rands = array();
	//	echo "$num_rows[0]";
		for($k = 0; $k<10; $k++) {
			$my_rand = rand(0, ($num_rows[0]-1));
			array_push($rands,$my_rand);
		}
		echo "<br>";
		sort($rands);
		//echo "<br>";
		if($result = mysqli_query($con,"SELECT * FROM kanjiinfo WHERE grade_level BETWEEN 1 and
			$grade")){
			$count = 1;
			$arrayindex = 0;
			while($rows = mysqli_fetch_array($result)) {
				array_push($temp_array, $rows[1]);
			/*	if($count == $rands[$arrayindex]) {
					array_push($kanji_picks,$rows[1]);
					$arrayindex++;
		//			echo "$rows[1] ";
					if($arrayindex == 10) {
		//			echo "broke it<br>";
						break;
					}
				}
				$count++;*/
			}
		//	echo count($kanji_picks) . "<br>";
			}
		for($k = 0; $k<10; $k++) {
			array_push($kanji_picks, $temp_array[$rands[$k]]);
		/*	echo $temp_array[$rands[$k]];
			echo "<br>";*/
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
			$words_array = array();
			$furi_array = array();
			$eng_array = array();
			$k_ids_array = array();
		//	$num_rows = mysqli_num_rows($result);
			while($rows = mysqli_fetch_array($result)){
				array_push($k_ids_array, $rows[0]);
				array_push($words_array, $rows[1]);
				array_push($furi_array, $rows[3]);
				array_push($eng_array, $rows[5]);
		//	echo "$num_rows <br>";
			}
			$rands2 = array();
			for($j=0;$j<10;$j++) {
				$my_rand = rand(1,count($words_array));
				array_push($rands2,$my_rand);
			}
			sort($rands2);
			$count = 1;
			$arrayindex=0;
			$questcount = 0;
			$k_ids = array();
			$words = array();
			$furigana = array();
			$english = array();
			for($k = 0; $k < 10; $k++) {
				array_push($words, $words_array[$rands2[$k]]);
				array_push($furigana, $furi_array[$rands2[$k]]);
				array_push($english, $eng_array[$rands2[$k]]);
				array_push($k_ids, $k_ids_array[$rands2[$k]]);
			}
		/*	$num_rows = mysqli_num_rows($result);
		//	echo "$num_rows <br>";
			$rands2 = array();
			for($j=0;$j<10;$j++) {
				$my_rand = rand(1,$num_rows);
				array_push($rands2,$my_rand);
			}
			sort($rands2);
			$count = 1;
			$arrayindex=0;
			$questcount = 0;
			$words = array();
			$furigana = array();
			$english = array();*/
	echo   "<div class='table-responsive'>";
	echo  "<table class='table table-striped'>";
	echo    "<thead>";
	echo     " <tr>";
	echo       " <th> Kanji </th>";
	echo        "<th> Furigana </th>";
	echo	   "<th> English </th>";
	echo      "</tr>";
	echo    "</thead>";
	echo    "<tbody>";
		/*	while(($rows = mysqli_fetch_array($result)) && ($count<$num_rows)) {
				if($count == $rands2[$arrayindex]) {
					array_push($words,$rows[1]);
					array_push($furigana,$rows[3]);
					array_push($english,$rows[5]);
					$arrayindex++;
					//echo "$rows[1] $rows[3] $rows[5]<br>";
					
					if($arrayindex == 10) {
						break;
					}
				}
				$count++;
			}*/
					echo "<tr>";
					echo "<th> $words[0] </th>";
					?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
					?> <th><div id='h'> <form class="form" name="answ1" id='f1' role="form" method="POST" > 
						<input name='<?php echo $k_ids[0];?>' type="text" class=form-control" id="answer1"  placeholder="English">
					       	</form></div><?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $words[1] </th>";
					?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
					?> <th><div id='h1'> <form class="form" role="form" id='f2' name="answ2" method="POST"> 
						<input name='<?php echo $k_ids[1];?>' type="answer" class=form-control" id="answer2"  placeholder="English">
					       	</form></div> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $words[2] </th>";
					?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
					?> <th> <div id='h2'><form class="form" role="form" id='f3' name="answ3" method="POST"> 
						<input name='<?php echo $k_ids[2];?>' type="answer" class=form-control" id="answer3" placeholder="English">
					       	</form></div> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $words[3] </th>";
					?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
					?> <th> <div id='h3'><form class="form" role="form" id='f4' name="answ4" method="POST"> 
						<input name='<?php echo $k_ids[3];?>' type="answer" class=form-control" id="answer4" placeholder="English">
					       	</form></div> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $words[4] </th>";
					?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
					?> <th><div id='h4'> <form class="form" role="form" id='f5' name="answ5" method="POST"> 
						<input name='<?php echo $k_ids[4];?>' type="answer" class=form-control" id="answer5" placeholder="English">
					       	</form></div> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					?> <th><div id='h5'> <form class="form" role="form" id='f6' name="answ6" method="POST"> 
						<input name='<?php echo $k_ids[5];?>' type="answer" class=form-control" id="answer6" placeholder="Kanji"> 
						</form></div> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $words[5]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $furigana[5]?>'" > show furigana </th> <?php
					echo "<th> $english[5] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <div id='h6'><form class="form" role="form" id='f7' name="answ7" method="POST"> 
						<input name='<?php echo $k_ids[6];?>' type="answer" class=form-control" id="answer7" placeholder="Kanji"> 
						</form></div><?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $words[6]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $furigana[6]?>'" > show furigana </th> <?php
					echo "<th> $english[6] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <div id='h7'><form class="form" role="form" id='f8' name="answ8" method="POST"> 
						<input name='<?php echo $k_ids[7];?>' type="answer" class=form-control" id="answer8" placeholder="Kanji"> 
						</form></div> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $words[7]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $furigana[7]?>'" > show furigana </th> <?php
					echo "<th> $english[7] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <div id='h8'> <form class="form" role="form" id='f9' name="answ9" method="POST"> 
						<input name='<?php echo $k_ids[8];?>' type="answer" class=form-control" id="answer9" placeholder="Kanji"> 
						</form> </div><?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $words[8]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $furigana[8]?>'" > show furigana </th> <?php
					echo "<th> $english[8] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <div id='h9'> <form class="form" role="form" id='ff' name="answ10" method="POST"> 
						<input name='<?php echo $k_ids[9];?>' type="answer" class=form-control" id="answer10" placeholder="Kanji"> 
						</form> </div><?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $words[9]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $furigana[9]?>'" > show furigana </th> <?php
					echo "<th> $english[9] </th>";
					echo "</tr>";
		}
	}
}
	    echo "</tbody>";
	  echo "</table>";
?>
	</div>
  </div>
 </div>
</div>
</body>
</html>

