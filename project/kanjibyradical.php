<?php
include "database_connector.php";
$var = $_POST["rad_id"];
$temp2 = mysqli_query($con,"SELECT * FROM rads WHERE id = '$var'");
if($temp2){
	$row2 = mysqli_fetch_array($temp2);
echo"<h1> Kanji for Radical: $row2[1] </h1>";
}
$temp = mysqli_query($con,"SELECT * FROM kanjiinfo WHERE radicals = '$var'");
if ($temp) {
	echo "<table class='table' cellpadding='3'>
<tr>
<td align='center'>Kanji</td>
<td align='center'>Grade Level</td>
<td align='center'>Strokes</td>
<td align='center'>Reading</td>
<td align='center'>Meaning</td>
</tr>";
	while ($row = mysqli_fetch_array($temp)) {
		echo "<tr class='info'>";
		echo "<td align='center'> $row[1] </td> ";
		echo "<td align='center'> $row[3] </td> ";
		echo "<td align='center'> $row[4] </td> ";
		echo "<td align='center'> $row[5] </td> ";
		echo "<td align='center'> $row[6] </td> ";
		echo "</tr>";
	}
	echo "</table>";
}
?>
