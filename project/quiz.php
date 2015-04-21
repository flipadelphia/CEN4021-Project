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
    <li> <a href=randquiz.php> Random Words Quiz </a> </li>
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
    <h1> It's Quiz Time! </h1>
	<p> This section is devoted to allowing you to take quizzes in multiple formats </p>
      <h2> Grade Level Quiz </h2>
	<p> This quiz type lets you pick a grade level of kanji you wish to learn based on 1st - 12th grade levels. </p>
      <h2> Random Words Quiz </h2>
	<p> This quiz type lets you take a quiz of randomly chosen words </p>
      <h2> Spcific Kanji </h2>
	<p> This quiz type lets you chose the kanji you would like to have a quiz on </p>
      <h2> Random Kanji Quiz </h2>
	<p> This quiz type prompts the user with random kanji asking questions about each </p>
  </div>
 </div>
</div>
</body>
</html>
