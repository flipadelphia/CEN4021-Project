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
		$.post("grade_eng.php", {k_id: y5, ans: x5}, function(data){
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
		$.post("grade_eng.php", {k_id: y6, ans: x6}, function(data){
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
		$.post("grade_eng.php", {k_id: y7, ans: x7}, function(data){
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
		$.post("grade_eng.php", {k_id: y8, ans: x8}, function(data){
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
		$.post("grade_eng.php", {k_id: y9, ans: x9}, function(data){
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
      <li><a href="index.html" target="main">Home</a></li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" > Kanji Search <span class="caret"></span></a>
	  <ul class="dropdown-menu" role="menu">
            <li><a href="meaning.php" target="main">Search by Meaning</a></li>
            <li><a href="hiragana.php" target="main">Search by Hiragana</a></li>
            <li><a href="byradical.php" target="main">Search by Radical</a></li>
            <li><a href="stroke.php" target="main">Search by Stroke Count</a></li>
	  </ul>
      </li> 
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown"> Word Search <span class="caret"></span></a>
	  <ul class="dropdown-menu" role="menu">
            <li><a href="etoj.php" target="main">Search by English</a></li>
            <li><a href="jtoe.php" target="main">Search by Japanese</a></li>
	  </ul>
      </li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown"> Study Area <span class="caret"></span></a>
	  <ul class="dropdown-menu" role="menu">
            <li class="active"><a href="quiz.php" target="main">Take a Quiz</a></li>
            <li><a href="flashcard.php" target="main">Make some Flashcards</a></li>
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
    <li> <a> Kanji Tools </a> </li>
    <li> <a> Flipadelphia </a> </li>
   </ul>
  </div>
  <div class="col-sm-9 ">
	<h2> Specific Kanji Quiz </h2>
	<p> For this quiz you type in the kanji that you want to be tested on, and then words with that kanji are what is tested. </p>
	<form role="form" action="bykanjiquiz.php" method="post">
	<p> Enter the kanji you want to be tested on: </p>
	<input type="text" class="form-control" name="kanji" id="kanji" placeholder="Kanji" >
	</form>
<?php
include "database_connector.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['kanji'])) {
	//	echo $_POST['kanji'];
		$kanjisearched = $_POST['kanji'];
		$numOfMatchedWords = array();
		$words = array();
		$furigana = array();
		$english = array();
		$k_ids = array();
		$temp = mysqli_query($con, "SELECT count(*) FROM dictionary WHERE kanji_word like '%$kanjisearched%'");
		if($temp){
			$num_of_entries = mysqli_fetch_array($temp);
			if($num_of_entries[0] == 0) {
			echo "<h1><span class='label label-warning'> Watch out </span></h1>";
			echo "<h2> <span class='label label-danger'> There were no matching kanji for the search: '" . $kanjisearched . "' make sure 
				you searched for a kanji! </span></h2> ";
			echo "<h1><span class='label label-warning'> Watch out </span></h1>";
			}
		}
		else {
			echo "<p> There were no matching kanji for the search: " . $kanjisearched . " make sure 
				you searched for a kanji! </p> ";
		}
		//echo $num_of_entries[0];
		$k = 0;
		$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE kanji_word like '%$kanjisearched%'");
		if($temp) {
		for($k; $k < $num_of_entries[0]; $k++) {	
			$temp1 = mysqli_fetch_array($temp);
		//	echo $temp1[0] . "</br>";
			array_push($numOfMatchedWords,$temp1[0]);
		}
		}
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

	/* This is long because of every case being covered didn't take the longest time to code just 
	 *  made sure that if there are not at least 10 words for a given kanji that a quiz will still be 
	 *  given unless there are no words*/
		if($num_of_entries[0] == 1) {
			$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$numOfMatchedWords[0]");
			$temp1 = mysqli_fetch_array($temp);
			echo "<tr>";
			echo "<th> $temp1[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $temp1[3]?>'" > show furigana </th> <?php
			?> <th> <div id='h' ><form class="form" id='f1' name="answ1" role="form" method="POST" > 
			<input type="text" class=form-control" name='<?php echo $temp1[0];?>' id="answer1"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $temp1[5]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 2) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				if($temp) {
					$temp1 = mysqli_fetch_array($temp);
					array_push($words,$temp1[1]);
					array_push($furigana,$temp1[3]);
					array_push($english,$temp1[5]);	
					array_push($k_ids,$temp1[0]);
				}
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <div id='h'><form class="form" id='f1' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[0];?>' type="answer" class=form-control" id="answer1"  placeholder="English">
		       	</form> </div><?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <div id='h1'><form class="form" id='f2' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[1];?>' type="answer" class=form-control" id="answer2"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 3) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				if($temp) {
					$temp1 = mysqli_fetch_array($temp);
					array_push($words,$temp1[1]);
					array_push($furigana,$temp1[3]);
					array_push($english,$temp1[5]);	
					array_push($k_ids,$temp1[0]);
				}
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <div id='h'><form class="form" id='f1' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[0];?>' type="answer" class=form-control" id="answer1"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th><div id='h1'> <form class="form" id='f2' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[1];?>' type="answer" class=form-control" id="answer2"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th><div id='h2'> <form class="form" id='f3' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[2];?>' type="answer" class=form-control" id="answer3"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 4) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				if($temp) {
					$temp1 = mysqli_fetch_array($temp);
					array_push($words,$temp1[1]);
					array_push($furigana,$temp1[3]);
					array_push($english,$temp1[5]);	
					array_push($k_ids,$temp1[0]);
				}
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th><div id='h'> <form class="form" id='f1' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[0];?>' type="answer" class=form-control" id="answer1"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th><div id='h1'> <form class="form" id='f2' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[1];?>' type="answer" class=form-control" id="answer2"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th><div id='h2'> <form class="form" id='f3' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[2];?>' type="answer" class=form-control" id="answer3"  placeholder="English">
		       	</form> </div><?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th> <div id='h3'> <form class="form" id='f4' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[3];?>' type="answer" class=form-control" id="answer4"  placeholder="English">
		       	</form> </div><?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 5) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				if($temp) {
					$temp1 = mysqli_fetch_array($temp);
					array_push($words,$temp1[1]);
					array_push($furigana,$temp1[3]);
					array_push($english,$temp1[5]);	
					array_push($k_ids,$temp1[0]);
				}
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <div id='h'><form class="form" id='f1' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[0];?>' type="answer" class=form-control" id="answer1"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th><div id='h1'> <form class="form" id='f2' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[1];?>' type="answer" class=form-control" id="answer2"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th><div id='h2'> <form class="form" id='f3' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[2];?>' type="answer" class=form-control" id="answer3"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th><div id='h3'> <form class="form" id='f4' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[3];?>' type="answer" class=form-control" id="answer4"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[4] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
			?> <th><div id='h4'> <form class="form" id='f5' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[4];?>' type="answer" class=form-control" id="answer5"  placeholder="English">
		       	</form> </div><?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 6) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				if($temp) {
					$temp1 = mysqli_fetch_array($temp);
					array_push($words,$temp1[1]);
					array_push($furigana,$temp1[3]);
					array_push($english,$temp1[5]);	
					array_push($k_ids,$temp1[0]);
				}
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th><div id='h'> <form class="form" id='f1' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[0];?>' type="answer" class=form-control" id="answer1"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <div id='h1'><form class="form" id='f2' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[1];?>' type="answer" class=form-control" id="answer2"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th><div id='h2'> <form class="form" id='f3' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[2];?>' type="answer" class=form-control" id="answer3"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th><div id='h3'> <form class="form" id='f4' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[3];?>' type="answer" class=form-control" id="answer4"  placeholder="English">
		       	</form> </div><?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[4] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
			?> <th><div id='h4'> <form class="form" id='f5' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[4];?>' type="answer" class=form-control" id="answer5"  placeholder="English">
		       	</form> </div><?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[5] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[5]?>'" > show furigana </th> <?php
			?> <th> <div id='h5'><form class="form" id='f6' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[5];?>' type="answer" class=form-control" id="answer6"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[5]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 7) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id='$search");
				if($temp) {
					$temp1 = mysqli_fetch_array($temp);
					array_push($words,$temp1[1]);
					array_push($furigana,$temp1[3]);
					array_push($english,$temp1[5]);	
					array_push($k_ids,$temp1[0]);
				}
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th><div id='h'> <form class="form" id='f1' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[0];?>' type="answer" class=form-control" id="answer1"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th><div id='h1'> <form class="form" id='f2' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[1];?>' type="answer" class=form-control" id="answer2"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th><div id='h2'> <form class="form" id='f3' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[2];?>' type="answer" class=form-control" id="answer3"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th><div id='h3'> <form class="form" id='f4' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[3];?>' type="answer" class=form-control" id="answer4"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[4] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
			?> <th> <div id='h4'><form class="form" id='f5' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[4];?>' type="answer" class=form-control" id="answer5"  placeholder="English">
		       	</form> </div><?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[5] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[5]?>'" > show furigana </th> <?php
			?> <th><div id='h5'> <form class="form" id='f6' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[5];?>' type="answer" class=form-control" id="answer6"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[5]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[6] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[6]?>'" > show furigana </th> <?php
			?> <th><div id='h6'> <form class="form" id='f7' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[6];?>' type="answer" class=form-control" id="answer7"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[6]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 8) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				if($temp) {
					$temp1 = mysqli_fetch_array($temp);
					array_push($words,$temp1[1]);
					array_push($furigana,$temp1[3]);
					array_push($english,$temp1[5]);	
					array_push($k_ids,$temp1[0]);
				}
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th><div id='h'> <form class="form" id='f1' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[0];?>' type="answer" class=form-control" id="answer1"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th><div id='h1'> <form class="form" id='f2' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[1];?>' type="answer" class=form-control" id="answer2"  placeholder="English">
		       	</form> </div><?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th><div id='h2'> <form class="form" id='f3' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[2];?>' type="answer" class=form-control" id="answer3"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th><div id='h3'> <form class="form" id='f4' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[3];?>' type="answer" class=form-control" id="answer4"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[4] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
			?> <th><div id='h4'> <form class="form" id='f5' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[4];?>' type="answer" class=form-control" id="answer5"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[5] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[5]?>'" > show furigana </th> <?php
			?> <th><div id='h5'> <form class="form" id='f6' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[5];?>' type="answer" class=form-control" id="answer6"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[5]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[6] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[6]?>'" > show furigana </th> <?php
			?> <th> <div id='h6'><form class="form" id='f7' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[6];?>' type="answer" class=form-control" id="answer7"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[6]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[7] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[7]?>'" > show furigana </th> <?php
			?> <th><div id='h7'> <form class="form" id='f8' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[7];?>' type="answer" class=form-control" id="answer8"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[7]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 9) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				if($temp) {
					$temp1 = mysqli_fetch_array($temp);
					array_push($words,$temp1[1]);
					array_push($furigana,$temp1[3]);
					array_push($english,$temp1[5]);	
					array_push($k_ids,$temp1[0]);
				}
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <div id='h'><form class="form" id='f1' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[0];?>' type="answer" class=form-control" id="answer1"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <div id='h1'><form class="form" id='f2' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[1];?>'  type="answer" class=form-control" id="answer2"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th><div id='h2'> <form class="form" id='f3' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[2];?>' type="answer" class=form-control" id="answer3"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th><div id='h3'> <form class="form" id='f4' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[3];?>' type="answer" class=form-control" id="answer4"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[4] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
			?> <th> <div id='h4'><form class="form" id='f5' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[4];?>' type="answer" class=form-control" id="answer5"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[5] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[5]?>'" > show furigana </th> <?php
			?> <th><div id='h5'> <form class="form" id='f6' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[5];?>' type="answer" class=form-control" id="answer6"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[5]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[6] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[6]?>'" > show furigana </th> <?php
			?> <th><div id='h6'> <form class="form" id='f7' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[6];?>' type="answer" class=form-control" id="answer7"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[6]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[7] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[7]?>'" > show furigana </th> <?php
			?> <th> <div id='h7'> <form class="form" id='f8' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[7];?>' type="answer" class=form-control" id="answer8"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[7]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[8] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[8]?>'" > show furigana </th> <?php
			?> <th><div id='h8'> <form class="form" id='f9' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[8];?>' type="answer" class=form-control" id="answer9"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[8]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] > 9 ) {
			$k = 0;
			for($k; $k < 10; $k++) {
				$my_rand = rand(0,$num_of_entries[0]);
				$search = $numOfMatchedWords[$my_rand];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				if($temp) {
					$temp1 = mysqli_fetch_array($temp);
					array_push($words,$temp1[1]);
					array_push($furigana,$temp1[3]);
					array_push($english,$temp1[5]);
					array_push($k_ids,$temp1[0]);
				}
			}
				echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <div id='h'><form class="form" id='f1' role="form" name="answ2" > 
			<input name='<?php echo $k_ids[0];?>' type="answer" class=form-control" id="answer1"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <div id='h1'> <form class="form" id='f2' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[1];?>' type="answer" class=form-control" id="answer2"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th><div id='h2'> <form class="form" id='f3' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[2];?>' type="answer" class=form-control" id="answer3"  placeholder="English">
		       	</form> </div><?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th><div id='h3'> <form class="form" id='f4' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[3];?>' type="answer" class=form-control" id="answer4"  placeholder="English">
		       	</form></div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[4] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
			?> <th><div id='h4'> <form class="form" id='f5' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[4];?>' type="answer" class=form-control" id="answer5"  placeholder="English">
		       	</form> </div><?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[5] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[5]?>'" > show furigana </th> <?php
			?> <th><div id='h5'> <form class="form" id='f6' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[5];?>' type="answer" class=form-control" id="answer6"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[5]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[6] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[6]?>'" > show furigana </th> <?php
			?> <th> <div id='h6'><form class="form" id='f7' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[6];?>' type="answer" class=form-control" id="answer7"  placeholder="English">
		       	</form> </div><?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[6]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[7] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[7]?>'" > show furigana </th> <?php
			?> <th><div id='h7'> <form class="form" id='f8' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[7];?>' type="answer" class=form-control" id="answer8"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[7]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[8] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[8]?>'" > show furigana </th> <?php
			?> <th><div id='h8'> <form class="form" id='f9' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[8];?>' type="answer" class=form-control" id="answer9"  placeholder="English">
		       	</form> </div><?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[8]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[9] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[9]?>'" > show furigana </th> <?php
			?> <th> <div id='h9'> <form class="form" id='ff' role="form" name="answ2" method="POST"> 
			<input name='<?php echo $k_ids[9];?>' type="answer" class=form-control" id="answer10"  placeholder="English">
		       	</form> </div> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[9]?>'"> Answer </p> </th> <?php
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
