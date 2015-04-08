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
      <a class="navbar-brand newfont"> Kanji Tools</a>
    </div>
      <ul class="nav navbar-nav pull-right">
      <li><a href="main.html" target="main">Home</a></li>
      <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" > Kanji Search <span class="caret"></span></a>
	  <ul class="dropdown-menu" role="menu">
            <li><a href="meaning.php" target="main">Search by Meaning</a></li>
            <li><a href="hiragana.php" target="main">Search by Hiragana</a></li>
            <li><a href="radical.html" target="main">Search by Radical</a></li>
            <li class="active"><a href="stroke.php" target="main">Search by Stroke Count</a></li>
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
            <li><a href="quiz.php" target="main">Take a Quiz</a></li>
            <li><a href="jtoe.php" target="main">Make some Flashcards</a></li>
	  </ul>
      </li>
      </ul>
    </div>
  </div>
</nav>
<div id="container">
<center>
<div id="innercont">
<!--****************************************************************************************************************************************************************-->
<form action="stroke.php" method="post">
<table width="200" border="0">
<tr>
<td>Stroke Count</td>
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
      $result=mysqli_query($con,"SELECT kanji, grade_level, sc, readings, meanings
                                 FROM kanjiinfo
                                 WHERE sc = '$keyword'");
      if($result)
      {
         $count=mysqli_num_rows($result);
         echo '<strong>'.$count.' kanji found'.'</strong><br/>';
?>
<br/><br/>
<table id="test" cellpadding="3">
<tr>

<td align="center">Kanji</td>
<td align="center">Grade Level</td>
<td align="center">Strokes</td>
<td align="center">Reading</td>
<td align="center">Meaning</td>
</tr>

<?php
         while($row=mysqli_fetch_array($result))
         {
?>

<tr bgcolor='<?php if(($color%2)==0) echo "#d3d3d3"; else echo "#ffffff"; ?>'>

<td align="center"><?php echo $row['kanji']; ?></td>
<td align="center"><?php echo $row['grade_level']; ?></td>
<td align="center"><?php echo $row['sc']; ?></td>
<td align="center"><?php echo $row['readings']; ?></td>
<td align="center"><?php echo $row['meanings']; ?></td>
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
<div class="mastfoot">
  <div class="inner">
    <p> Kanji Tools </p>
    <p> Team: Flipadelphia </p>
  </div>
</div>
</body>
</html>
