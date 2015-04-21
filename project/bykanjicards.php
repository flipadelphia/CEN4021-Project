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
<style>
.card {
  position: relative;
  float: left;
  padding-bottom: 25%;
  width: 25%;
  text-align: center;
}

.card__front,
.card__back {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.card__front,
.card__back {
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transition: -webkit-transform 0.3s;
          transition: transform 0.3s;
}

.card__front {
  background-color: #b5d8e8;
}

.card__back {
  background-color: #d3d3d3;
  -webkit-transform: rotateY(-180deg);
          transform: rotateY(-180deg);
}
.card__text {
  display: inline-block;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
  height: 20px;
//  color: #fff;
  font-family: "Roboto Slab", serif;
  line-height: 20px;
}
.card.effect__click.flipped .card__front {
  -webkit-transform: rotateY(-180deg);
          transform: rotateY(-180deg);
}

.card.effect__click.flipped .card__back {
  -webkit-transform: rotateY(0);
          transform: rotateY(0);
}
</style>
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
            <li><a href="quiz.php">Take a Quiz</a></li>
            <li class="active"><a href="flashcard.php">Make some Flashcards</a></li>
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
    <li> Flash Card Methods </li>
    <li> <a href=glcards.php> Grade Level Cards </a> </li>
    <li> <a href=randcards.php> Random Cards </a> </li>
    <li> <a href=bykanjicards.php> Specific Kanji </a> </li>
   </ul>
   <ul class="nav nav-sidebar">
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
	<h2> Specific Kanji Cards </h2>
	<p> For this card set you type in the kanji that you want to be tested on, and then words with that kanji are what is tested. </p>
	<form role="form" action="bykanjicards.php" method="post">
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

	/* This is long because of every case being covered didn't take the longest time to code just 
	 *  made sure that if there are not at least 10 words for a given kanji that a quiz will still be 
	 *  given unless there are no words*/
		

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
$words = implode(",", $words);
$english = implode(",", $english);
?>
<!-- *************************************************************************************** -->
<script type="text/javascript"> 
var i = 0;
var eng = new Array();   
eng = '<?php echo $english; ?>'.split(",");  
var k = eng.length-1;    
var word = new Array(); 
word = '<?php echo $words; ?>'.split(",");

function next(){
var el = document.getElementById("front"); 
el.innerHTML=word[i]; 
var img= document.getElementById("back"); 
img.innerHTML= eng[i]; 
if(i < k ) { i++;}  
else  { i = 0; }
}

function prev(){
var el = document.getElementById("front"); 
el.innerHTML=word[i]; 
var img= document.getElementById("back"); 
img.innerHTML= eng[i]; 
if(i >0 ) { i--;}  
else  { i = k; } 
}

function swapImage(){ 
var el = document.getElementById("front"); 
el.innerHTML=word[i]; 
var img= document.getElementById("back"); 
img.innerHTML= eng[i]; 
if(i < k ) { i++;}  
else  { i = 0; } 
//setTimeout("swapImage()",5000); 
} 
function addLoadEvent(func) { 
var oldonload = window.onload; 
if (typeof window.onload != 'function') { 
window.onload = func; 
} else  { 
window.onload = function() { 
if (oldonload) { 
oldonload(); 
} 
func(); 
} 
} 
} 
addLoadEvent(function() { 
swapImage(); 
});  
</script> 

          <div class="card effect__click">
            <div class="card__front">
              <span id="front" name="card_fnt" class="card__text"></span>
            </div>
            <div class="card__back">
              <span id="back" name="card_bck" class="card__text"></span>
            </div>
        </div><!-- /card -->

<img onclick="prev()" height="25" width="25"src="images/prev.jpg"/> 
<img onclick="next()" height="25" width="25" src="images/next.jpg"/> 

<script type="text/javascript">
(function() {
  var cards = document.querySelectorAll(".card.effect__click");
  for ( var i  = 0, len = cards.length; i < len; i++ ) {
    var card = cards[i];
    clickListener( card );
  }

  function clickListener(card) {
    card.addEventListener( "click", function() {
      var c = this.classList;
      c.contains("flipped") === true ? c.remove("flipped") : c.add("flipped");
    });
  }
})();
</script>
<!-- *************************************************************************************** -->
<?php
		
	}
}
?>
	</div>
  </div>
 </div>
</div>
</div>
</body>
</html>
