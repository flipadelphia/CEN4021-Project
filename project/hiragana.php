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
<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
</head>
<body>
<div id="content">
<center>
<div id="innercont">
<!--****************************************************************************************************************************************************************-->
<form action="hiragana.php" method="post">
<table width="200" border="0">
<tr>
<td>Hiragana</td>
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
                                 WHERE readings LIKE '%$keyword%'");
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
</body>
</html>