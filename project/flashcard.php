<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>Kanji Tools</title>
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
    <li> <a href=glcards.php> Grade Level Cards </a> </li>
    <li> <a href=randcards.php> Random Cards </a> </li>
    <li> <a href=bykanjicards.php> Specific Kanji </a> </li>
   </ul>
   <ul class="nav nav-sidebar">
    <li> <a href="http://www.kanjialive.com"> Kanji Alive </a> </li>
    <li> <a href="http://www.edrdg.org/jmdict/j_jmdict.html"> JMDict </a> </li>
   </ul>
  </div>
  <div class="col-sm-9 ">
    <h1> Flashcards! </h1>
	<p> This section is devoted to allowing you to make flashcards in multiple formats </p>
      <h2> Grade Level Cards </h2>
	<p> This option lets you pick a grade level of kanji you wish to learn based on 1st - 12th grade levels. </p>
      <h2> Random Cards </h2>
	<p> This option lets you make flashcards of randomly chosen words </p>
      <h2> Spcific Kanji </h2>
	<p> This option lets you chose the kanji you would like to have in a set of flashcards </p>
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
