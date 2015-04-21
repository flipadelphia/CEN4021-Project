<!DOCTYPE html>
<html>

<?php
   include 'database_connector.php';
   $mysqli = new mysqli("localhost", "root", "", "kanji");
   $color=0;
   if(isset($_POST['keyword']))
   {
      $keyword=$_POST['keyword'];

      //$_POST['submit']="Search";
   }
   else
   {
      $keyword="";
   }
?>

<head>
<meta charset="utf-8">
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
      <a class="dropdown-toggle" data-toggle="dropdown"> Kanji Search <span class="caret"></span></a>
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
            <li class="active"><a href="jtoe.php">Search by Japanese</a></li>
	  </ul>
      </li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown"> Study Area <span class="caret"></span></a>
	  <ul class="dropdown-menu" role="menu">
            <li><a href="quiz.php">Take a Quiz</a></li>
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
    <li> Word Searching </li>
    <li> <a href=etoj.php> Search by English </a> </li>
    <li> <a href=jtoe.php> Search by Japanese </a> </li>
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
<div id="content">
<center>
<div id="innercont">
<h1> Search for Words by Japanese </h1>
<h3> If you know the Japanese of the word you're searching for then type it in and search for it! </h3>
<!--****************************************************************************************************************************************************************-->
<form action="jtoe.php" method="post">
<table width="200" border="0">
<tr>
<td><h3>Japanese Word</h3></td>
<td>&nbsp;</td>
<td>
<input name="keyword" type="text" id="keyword" value="<?php echo $keyword;?>">
</td>
</tr>
</table>
</form>
<?php
   if(isset($_POST['keyword']))
   {
      $result=mysqli_query($con,"SELECT kanji_word, word_reading, gloss, more_gloss
                                 FROM dictionary
                                 WHERE (kanji_word LIKE '%$keyword%' OR word_reading LIKE '%$keyword%')
				 order by case when (kanji_word LIKE '$keyword' OR word_reading LIKE '$keyword') then 1
					       when (kanji_word LIKE '$keyword,%' OR word_reading LIKE '$keyword,%') then 2
					       when (kanji_word LIKE '% $keyword,%' OR word_reading LIKE '% $keyword,%') then 3
					       when (kanji_word LIKE '%$keyword%' OR word_reading LIKE '%$keyword%')then 4 end");
      if($result)
      {
         $count=mysqli_num_rows($result);
         echo '<strong>'.$count.' words found'.'</strong><br/>';
?>
<br/><br/>
<table id="test" cellpadding="3">
<tr>

<td align="center">Kanji Word</td>
<td align="center">Reading</td>
<td align="center">Meanings</td>
<td align="center">Other Meanings</td>
</tr>

<?php
         while($row=mysqli_fetch_array($result))
         {
?>

<tr bgcolor='<?php if(($color%2)==0) echo "#d3d3d3"; else echo "#ffffff"; ?>'>

<td align="center"><?php echo $row['kanji_word']; ?></td>
<td align="center"><?php echo $row['word_reading']; ?></td>
<td align="center"><?php echo $row['gloss']; ?></td>
<td align="center"><?php echo $row['more_gloss']; ?></td>
</tr>

<?php 
            $color=$color+1;
         }
      }
?>
</table>
<?php
   }
?>

<!--****************************************************************************************************************************************************************-->
</div>
</center>
</div>
</div>
</body>
</html>
