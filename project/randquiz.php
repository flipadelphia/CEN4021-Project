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
<div id="content">
<div class="container-fluid">
 <div class="row">
  <div class="col-sm-3 col-md-2 sidebar">
   <ul class="nav nav-sidebar">
    <li> Quiz Time! </li>
    <li> <a href=glquiz.php> Grade Level Quiz </a> </li>
    <li class="active"> <a href=randquiz.php> Random Quiz </a> </li>
    <li> <a href=bykanjiquiz.php> Specific Kanji </a> </li>
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
					?> <th onclick="this.innerHTML='<?php echo $problems[0]?>'" > show furigana </th> <?php
					?> <th> <form class="form" name="answ1" role="form" method="POST" > 
						<input type="text" class=form-control" name="answer1" id="answer1" value="" placeholder="English">
					       	</form> 
<?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $answers[0]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $kanji[1] </th>";
					?> <th onclick="this.innerHTML='<?php echo $problems[1]?>'" > show furigana </th> <?php
					?> <th> <form class="form" role="form" name="answ2" method="POST"> 
						<input type="answer" class=form-control" id="answer2" value="" placeholder="English">
					       	</form> <?php
					?>  <p class="text-primary" onclick="this.innerHTML='<?php echo $answers[1]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $kanji[2] </th>";
					?> <th onclick="this.innerHTML='<?php echo $problems[2]?>'" > show furigana </th> <?php
					?> <th> <form class="form" role="form" name="answ3" method="POST"> 
						<input type="answer" class=form-control" id="answer3" placeholder="English">
					       	</form> <?php
					?>  <p class="text-primary" onclick="this.innerHTML='<?php echo $answers[2]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $kanji[3] </th>";
					?> <th onclick="this.innerHTML='<?php echo $problems[3]?>'" > show furigana </th> <?php
					?> <th> <form class="form" role="form" name="answ4" method="POST"> 
						<input type="answer" class=form-control" id="answer4" placeholder="English">
					       	</form> <?php
					?>  <p class="text-primary" onclick="this.innerHTML='<?php echo $answers[3]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					echo "<th> $kanji[4] </th>";
					?> <th onclick="this.innerHTML='<?php echo $problems[4]?>'" > show furigana </th> <?php
					?> <th> <form class="form" role="form" name="answ5" method="POST"> 
						<input type="answer" class=form-control" id="answer5" placeholder="English">
					       	</form> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $answers[4]?>'"> Answer </p> </th> <?php
					echo "</tr>";
					
					echo "<tr>";
					?> <th> <form class="form" role="form" name="answ6" method="POST"> 
						<input type="answer" class=form-control" id="answer6" placeholder="Kanji"> 
						</form> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $kanji[5]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $problems[5]?>'" > show furigana </th> <?php
					echo "<th> $answers[5] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <form class="form" role="form" name="answ7" method="POST"> 
						<input type="answer" class=form-control" id="answer7" placeholder="Kanji"> 
						</form> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $kanji[6]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $problems[6]?>'" > show furigana </th> <?php
					echo "<th> $answers[6] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <form class="form" role="form" name="answ8" method="POST"> 
						<input type="answer" class=form-control" id="answer8" placeholder="Kanji"> 
						</form> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $kanji[7]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $problems[7]?>'" > show furigana </th> <?php
					echo "<th> $answers[7] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <form class="form" role="form" name="answ9" method="POST"> 
						<input type="answer" class=form-control" id="answer6" placeholder="Kanji"> 
						</form> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $kanji[8]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $problems[8]?>'" > show furigana </th> <?php
					echo "<th> $answers[8] </th>";
					echo "</tr>";
					echo "<tr>";
					?> <th> <form class="form" role="form" name="answ10" method="POST"> 
						<input type="answer" class=form-control" id="answer9" placeholder="Kanji"> 
						</form> <?php
					?> <p class="text-primary" onclick="this.innerHTML='<?php echo $kanji[9]?>'"> Answer </p> </th> <?php
					?> <th onclick="this.innerHTML='<?php echo $problems[9]?>'" > show furigana </th> <?php
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
