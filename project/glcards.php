<!DOCTYPE html>
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
  left: 165px;
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
    <h1> Grade Level Cards </h1>
      <p> This option lets you pick a grade level of kanji you wish to learn based on 1st - 12th grade levels. </p>
      <form action="glcards.php" method="post">
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
$words = implode(",", $words);
$english = implode(",", $english);
$furigana = implode(",", $furigana);
?>
<!-- *************************************************************************************** -->
<script type="text/javascript"> 
var i = 0;
var eng = new Array();   
eng = '<?php echo $english; ?>'.split(",");  
var k = eng.length-1;    
var word = new Array(); 
word = '<?php echo $words; ?>'.split(",");
var furi = new Array(); 
furi = '<?php echo $furigana; ?>'.split(",");

function next(){
var frnt = document.getElementById("front"); 
frnt.innerHTML=word[i]; 
var ebck = document.getElementById("eback"); 
ebck.innerHTML= eng[i]; 
var rbck = document.getElementById("rback"); 
rbck.innerHTML= furi[i]; 
if(i < k ) { i++;}  
else  { i = 0; }
}

function prev(){
var frnt = document.getElementById("front"); 
frnt.innerHTML=word[i]; 
var ebck = document.getElementById("eback"); 
ebck.innerHTML= eng[i]; 
var rbck = document.getElementById("rback"); 
rbck.innerHTML= furi[i]; 
if(i >0 ) { i--;}  
else  { i = k; } 
}

function swapImage(){ 
var frnt = document.getElementById("front"); 
frnt.innerHTML=word[i]; 
var ebck = document.getElementById("eback"); 
ebck.innerHTML= eng[i]; 
var rbck = document.getElementById("rback"); 
rbck.innerHTML= furi[i]; 
if(i < k ) { i++;}  
else  { i = 0; }  
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
 
<table width = "100%">
<tr>
          <div class="card effect__click">
            <div class="card__front">
              <span id="front" name="card_fnt" class="card__text"></span>
            </div>
            <div class="card__back">
<div class="card__text">

              <span id="eback" name="card_bck"></span>
</br>
		<span id="rback" name="card_bck"></span>

</div>
            </div>
        </div><!-- /card -->
</tr><tr><td style="padding-left:23%">
<img onclick="prev()" height="40" width="40"src="images/prev.jpg"/> 
<img onclick="next()" height="40" width="40" src="images/next.jpg"/> 
</td></tr></table>

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
}
?>

	</div>
  </div>
 </div>
</div>
</div>

</body>
</html>
