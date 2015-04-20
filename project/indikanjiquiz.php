<html>
<meta charset="utf8">
<head>
<title>Kanji Tools</title>
<link href="http://fonts.googleapis.com/css?family=Lobster" rel"stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/mycss.css">
<meta name="viewpoint" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"> </script>
<style>
p{
	font-size: 250px;
}
</style>
<script>
$(document).ready(function() {
	$('#myquiz').on('click','button',function() {
		var x = document.getElementById("myanswer").value;
		var y = document.getElementById("next").value;
		var z = document.getElementById("myanswer").name;
		$.post("grade_me.php", {k_id: y, ans: x, que: z}, function(data){
			$('#old').html(data);	
		});
		$.post("newquest.php", function(data) {
			$('#question').html(data);
		});
	});
});
$(document).ready(function(){

	$("form").submit(function(){
		var x = document.getElementById("myanswer").value;
		var y = document.getElementById("next").value;
		var z = document.getElementById("myanswer").name;
		$.post("grade_me.php", {k_id: y, ans: x, que: z}, function(data){
			$('#old').html(data);	
		});
		$.post("newquest.php", function(data) {
			$('#question').html(data);
		});
		return false;
	});
});
</script>
<head>
<body>
<?php

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
	//	echo count($sc);
	}
	$num = rand(0, (count($kanji)-1));
//	echo $num;
	$num2 = rand(1, 3);
?>
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
    <li class="active"> <a href=randquiz.php> Random Words </a> </li>
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
    <li> <a href="index.html"> Kanji Tools </a> </li>
    <li> <a href="flipadelphia.html"> Flipadelphia </a> </li>
   </ul>
  </div>
  <div class="col-sm-9 ">
  <h1> You will be asked random questions about kanji.  Do your best! </h1>
	<div id="old">
	</div>
	<div id="question" class="col-sm-4">
	<form role="form" class="form-inline">
	  <div id='myquiz' class="form-group">
	  <p >  <?php echo $kanji[$num]?> </p>
	<?php 
		if($num2 == 1) {
		echo "<label> How many strokes? </label>";
	        echo "<input type='text' id='myanswer' name='1' class='form-control'> </input>";
		}
		if($num2 == 2) {
		echo "<label> What is the meaning? </label>";
	        echo "<input type='text' id='myanswer' name='2' class='form-control'> </input>";
		}
		if($num2 == 3) {
		echo "<label> What is a reading? </label>";
	        echo "<input type='text' id='myanswer' name='3' class='form-control'> </input>";
		}
		?>
			<button id="next" type='button' class='btn btn-default' value="<?php echo $num;?>">Next</button>
	  </div>
	</form>
	</div>
   </div>
  </div>
</div>
</body>
</html>
