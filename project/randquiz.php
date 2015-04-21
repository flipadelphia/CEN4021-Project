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
            <li><a href="stroke.php">Search by Stroke Count</a></li>
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
    <li class="active"> <a href=randquiz.php> Random Words Quiz </a> </li>
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
    <h2> Random Quiz Time! </h2>
     <p> This quiz is generated by providing randomly chosen vocabulary words </p>
     <form action="randquiz.php" method="post">
      <input type="submit" class="btn btn-sm btn-success" name="random" value="Random">
     </form>


<?php
include "database_connector.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['random'])) {
	//	echo "I still win\n";
		$k_ids = array();
		$answers = array();
		$problems = array();
		$kanji = array();
		$temp = mysqli_query($con,"SELECT count(*) FROM dictionary WHERE id > 0");
		$num_of_entries = mysqli_fetch_array($temp);
	//	echo $num_of_entries[0] . "\n";
		$j = 0;
		for($j; $j < 5; $j++) {
			$my_rand = rand(1,$num_of_entries[0]);
			$temp = mysqli_query($con,"SELECT * FROM dictionary WHERE id=$my_rand");
			$temp2 = mysqli_fetch_array($temp);
			array_push($k_ids, "$temp2[0]");
			array_push($answers,"$temp2[5]");
			array_push($problems,"$temp2[3]");
			array_push($kanji,"$temp2[1]");
		}
		$i = 0;
		for($i; $i < 5; $i++) {
			$my_rand = rand(1,$num_of_entries[0]);
			$temp = mysqli_query($con,"SELECT * FROM dictionary WHERE id=$my_rand");
			$temp2 = mysqli_fetch_array($temp);
			array_push($k_ids, "$temp2[0]");
			array_push($answers,"$temp2[5]");
			array_push($problems,"$temp2[3]");
			array_push($kanji,"$temp2[1]");
		}
	/*	$k = 0;
		for($k; $k < 10; $k++) {
			$temp = $problems[$k];
			$temp2 = $answers[$k];
			if($k < 5) {
				if($kanji[$k] != null) {
					$temp3 = $kanji[$k];
				//	echo "$temp3/";
				}
			//	echo "$temp $temp2<br>";
			}
			else {
				if($kanji[$k] != null) {
					$temp3 = $kanji[$k];
				//	echo "$temp3/";
				}
				echo "$temp2 $temp<br>";
			}
		}*/
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
					echo "<tr>";
					echo "<th> $kanji[0] </th>";
					?> <th onclick="this.innerHTML='<?php echo $problems[0];?>'" > show furigana </th>					
						<th><div id='h' name='<?php echo $k_ids[0];?>'>
						<form class="form" id='f1' name="answ1" role="form" > 
						<input name='<?php echo $k_ids[0];?>' type="text" class=form-control" name="answer1" id="answer1" value="" placeholder="English">
					       	</form>  </div> 
					   <p class="text-primary" onclick="this.innerHTML='<?php echo $answers[0];?>'" id='a1'> Answer </p></th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $kanji[1] </th>";
					?> <th onclick="this.innerHTML='<?php echo $problems[1];?>'" > show furigana </th>
						<th> <div id='h1'>
						<form class="form" role="form" id='f2' name="answ2"> 
						<input name='<?php echo $k_ids[1];?>' type="answer" class=form-control" id="answer2" value="" placeholder="English">
						</form> </div>
					       	<p class="text-primary" onclick="this.innerHTML='<?php echo $answers[1];?>'" value="<?php echo $answers[1];?>" id='a2'> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $kanji[2] </th>";
					?> <th onclick="this.innerHTML='<?php echo $problems[2];?>'" > show furigana </th> <?php
					?> <th> <div id='h2'> <form class="form" role="form" id ='f3' name="answ3"> 
						<input name='<?php echo $k_ids[2];?>' type="answer" class=form-control" id="answer3" placeholder="English">
						</form> </div>
						<p class="text-primary" onclick="this.innerHTML='<?php echo $answers[2]?>'" value="<?php echo $answers[2];?>" id='a3'> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $kanji[3] </th>";
					?> <th onclick="this.innerHTML='<?php echo $problems[3];?>'" > show furigana </th> <?php
					?> <th> <div id='h3'> <form class="form" role="form" id='f4' name="answ4" method="POST"> 
						<input name='<?php echo $k_ids[3];?>' type="answer" class=form-control" id="answer4" placeholder="English">
						</form> </div>
					       	<p class="text-primary" onclick="this.innerHTML='<?php echo $answers[3];?>'" value="<?php echo $answers[3];?>" id='a4'> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $kanji[4] </th>";
					?> <th onclick="this.innerHTML='<?php echo $problems[4];?>'" > show furigana </th> <?php
					?> <th> <div id='h4'> <form class="form" role="form"  id='f5' name="answ5" method="POST"> 
						<input name='<?php echo $k_ids[4];?>' type="answer" class=form-control" id="answer5" placeholder="English">
						</form></div>
					       	<p class="text-primary" onclick="this.innerHTML='<?php echo $answers[4];?>'" value="<?php echo $answers[4];?>" id='a5'> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					?> <th> <div id='h5'> <form class="form" role="form" id='f6' name="answ6" method="POST"> 
						<input name='<?php echo $k_ids[5];?>' type="answer" class=form-control" id="answer6" placeholder="Kanji"> 
						</form> </div>
					       	<p class="text-primary" onclick="this.innerHTML='<?php echo $kanji[5];?>'" value="<?php echo $kanji[5];?>" id='a6'> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $problems[5];?>'" > show furigana </th> <?php
					echo "<th> $answers[5] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <div id='h6'> <form class="form" role="form" id='f7' name="answ7" method="POST"> 
						<input name='<?php echo $k_ids[6];?>' type="answer" class=form-control" id="answer7" placeholder="Kanji"> 
						</form> </div>
					       	<p class="text-primary" onclick="this.innerHTML='<?php echo $kanji[6];?>'" value="<?php echo $kanji[6];?>" id='a7'> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $problems[6];?>'" > show furigana </th> <?php
					echo "<th> $answers[6] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <div id='h7'> <form class="form" role="form" id='f8' name="answ8" method="POST"> 
						<input name='<?php echo $k_ids[7];?>' type="answer" class=form-control" id="answer8" placeholder="Kanji"> 
						</form></div>
					       	<p class="text-primary" onclick="this.innerHTML='<?php echo $kanji[7];?>'" value="<?php echo $kanji[7];?>" id='a8'> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $problems[7];?>'" > show furigana </th> <?php
					echo "<th> $answers[7] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <div id='h8'> <form class="form" role="form" id='f9' name="answ9" method="POST"> 
						<input name='<?php echo $k_ids[8];?>' type="answer" class=form-control" id="answer9" placeholder="Kanji"> 
						</form> </div>
					       	<p class="text-primary" onclick="this.innerHTML='<?php echo $kanji[8];?>'" name="<?php echo $kanji[8];?>" id='a9'> Answer </p>  </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $problems[8];?>'" > show furigana </th> <?php
					echo "<th> $answers[8] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <div id='h9'> <form class="form" role="form" id='ff' name='<?php echo $kanji[9];?>'> 
						<input name='<?php echo $k_ids[9];?>' type="answer" class=form-control" id="answer10" placeholder="Kanji"> 
						</form> </div> <p class="text-primary" onclick="this.innerHTML='<?php echo $kanji[9];?>'"  id='a10'> Answer </p>  </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $problems[9];?>'" > show furigana </th> <?php
					echo "<th> $answers[9] </th>";
					echo "</tr>";
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

