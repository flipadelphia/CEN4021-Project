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
            <li><a href="radical.html">Search by Radical</a></li>
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
<div id="content">
<div class="container-fluid">
 <div class="row">
  <div class="col-sm-3 col-md-2 sidebar">
   <ul class="nav nav-sidebar">
    <li> <a href=glquiz.php> Grade Level Quiz </a> </li>
    <li> <a href=randquiz.php> Random Quiz </a> </li>
    <li> <a href=bykanjiquiz.php> Specific Kanji </a> </li>
   </ul>
   <ul class="nav nav-sidebar">
    <li> <a href="http://www.kanjialive.com"> Kanji Alive </a> </li>
    <li> <a href="http://www.edrdg.org/jmdict/j_jmdict.html"> JMDict </a> </li>
   </ul>
  </div>
  <div class="col-sm-9 ">
	<h2> Specific Kanji Quiz </h2>
	<p> For this quiz you type in the kanji that you want to be tested on, and then words with that kanji are what is tested. </p>
	<form role="form" action="bykanjiquiz.php" method="post">
	<p> Enter the kanji you want to be tested on: </p>
	<input type="text" class="form-control" name="kanji" id="kanji" placeholder="Kanji" value="">
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
		for($k; $k < $num_of_entries[0]; $k++) {	
			$temp1 = mysqli_fetch_array($temp);
		//	echo $temp1[0] . "</br>";
			array_push($numOfMatchedWords,$temp1[0]);
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
			?> <th onclick="this.innerHTML='<?php echo $temp[3]?>'" > show furigana </th> <?php
			?> <th> <form class="form" name="answ1" role="form" method="POST" > 
			<input type="text" class=form-control" name="answer1" id="answer1" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $temp[5]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 2) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				$temp1 = mysqli_fetch_array($temp);
				array_push($words,$temp1[1]);
				array_push($furigana,$temp1[3]);
				array_push($english,$temp1[5]);	
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 3) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				$temp1 = mysqli_fetch_array($temp);
				array_push($words,$temp1[1]);
				array_push($furigana,$temp1[3]);
				array_push($english,$temp1[5]);	
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 4) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				$temp1 = mysqli_fetch_array($temp);
				array_push($words,$temp1[1]);
				array_push($furigana,$temp1[3]);
				array_push($english,$temp1[5]);	
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 5) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				$temp1 = mysqli_fetch_array($temp);
				array_push($words,$temp1[1]);
				array_push($furigana,$temp1[3]);
				array_push($english,$temp1[5]);	
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[4] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 6) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				$temp1 = mysqli_fetch_array($temp);
				array_push($words,$temp1[1]);
				array_push($furigana,$temp1[3]);
				array_push($english,$temp1[5]);	
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[4] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[5] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[5]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[5]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 7) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id='$search");
				$temp1 = mysqli_fetch_array($temp);
				array_push($words,$temp1[1]);
				array_push($furigana,$temp1[3]);
				array_push($english,$temp1[5]);	
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[4] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[5] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[5]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[5]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[6] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[6]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[6]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 8) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				$temp1 = mysqli_fetch_array($temp);
				array_push($words,$temp1[1]);
				array_push($furigana,$temp1[3]);
				array_push($english,$temp1[5]);	
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[4] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[5] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[5]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[5]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[6] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[6]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[6]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[7] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[7]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[7]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] == 9) {
			$k = 0;
			for($k; $k < $num_of_entries; $k++) {
				$search = $numOfMatchedWords[$k];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				$temp1 = mysqli_fetch_array($temp);
				array_push($words,$temp1[1]);
				array_push($furigana,$temp1[3]);
				array_push($english,$temp1[5]);	
			}
			echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[4] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[5] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[5]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[5]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[6] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[6]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[6]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[7] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[7]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[7]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[8] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[8]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[8]?>'"> Answer </p> </th> <?php
			echo "</tr>";
		}
		if($num_of_entries[0] > 9 ) {
			$k = 0;
			for($k; $k < 10; $k++) {
				$my_rand = rand(0,$num_of_entries[0]);
				$search = $numOfMatchedWords[$my_rand];
				$temp = mysqli_query($con, "SELECT * FROM dictionary WHERE id=$search");
				$temp1 = mysqli_fetch_array($temp);
				array_push($words,$temp1[1]);
				array_push($furigana,$temp1[3]);
				array_push($english,$temp1[5]);
			}
				echo "<tr>";
			echo "<th> $words[0] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[0]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[1] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[1]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[1]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[2] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[2]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[3] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[4] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[5] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[5]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[5]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[6] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[6]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[6]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[7] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[7]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[7]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[8] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[8]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
			?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[8]?>'"> Answer </p> </th> <?php
			echo "</tr>";
			echo "<tr>";
			echo "<th> $words[9] </th>";
			?> <th onclick="this.innerHTML='<?php echo $furigana[9]?>'" > show furigana </th> <?php
			?> <th> <form class="form" role="form" name="answ2" method="POST"> 
			<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
		       	</form> <?php
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
<div class="footer myfooter navbar-fixed-bottom">
<p> Kanji Tools by Flipadelphia </p>
</div>
</div>
</body>
</html>