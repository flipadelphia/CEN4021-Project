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
      <li><a href="main.html" target="main">Home</a></li>
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
			$questcount = 0;
			$words = array();
			$furigana = array();
			$english = array();
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
			while(($rows = mysqli_fetch_array($result)) && ($count<$num_rows)) {
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
			}
					echo "<tr>";
					echo "<th> $words[0] </th>";
					?> <th onclick="this.innerHTML='<?php echo $furigana[0]?>'" > show furigana </th> <?php
					?> <th> <form class="form" name="answ1" role="form" method="POST" > 
						<input type="text" class=form-control" name="answer1" id="answer1" value="" placeholder="English">
					       	</form><?php
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
					?> <th> <form class="form" role="form" name="answ3" method="POST"> 
						<input type="answer" class=form-control" id="answer3" placeholder="English">
					       	</form> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[2]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $words[3] </th>";
					?> <th onclick="this.innerHTML='<?php echo $furigana[3]?>'" > show furigana </th> <?php
					?> <th> <form class="form" role="form" name="answ4" method="POST"> 
						<input type="answer" class=form-control" id="answer4" placeholder="English">
					       	</form> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[3]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $words[4] </th>";
					?> <th onclick="this.innerHTML='<?php echo $furigana[4]?>'" > show furigana </th> <?php
					?> <th> <form class="form" role="form" name="answ5" method="POST"> 
						<input type="answer" class=form-control" id="answer5" placeholder="English">
					       	</form> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $english[4]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					?> <th> <form class="form" role="form" name="answ6" method="POST"> 
						<input type="answer" class=form-control" id="answer6" placeholder="Kanji"> 
						</form> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $words[5]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $furigana[5]?>'" > show furigana </th> <?php
					echo "<th> $english[5] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <form class="form" role="form" name="answ7" method="POST"> 
						<input type="answer" class=form-control" id="answer7" placeholder="Kanji"> 
						</form><?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $words[6]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $furigana[6]?>'" > show furigana </th> <?php
					echo "<th> $english[6] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <form class="form" role="form" name="answ8" method="POST"> 
						<input type="answer" class=form-control" id="answer8" placeholder="Kanji"> 
						</form> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $words[7]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $furigana[7]?>'" > show furigana </th> <?php
					echo "<th> $english[7] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <form class="form" role="form" name="answ9" method="POST"> 
						<input type="answer" class=form-control" id="answer6" placeholder="Kanji"> 
						</form> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $words[8]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $furigana[8]?>'" > show furigana </th> <?php
					echo "<th> $english[8] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <form class="form" role="form" name="answ10" method="POST"> 
						<input type="answer" class=form-control" id="answer9" placeholder="Kanji"> 
						</form> <?php
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

