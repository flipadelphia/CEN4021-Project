<!DOCTYPE HTML>
<html>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<body>
<?php
include 'database_connector.php';
header( 'Content-Type: text/html; charset=UTF-8' );
$result = mysqli_query($con,"SET NAMES UTF-8");
$result = mysqli_query($con,"Set CHARACTER SET UTF-8");
iconv_set_encoding("input_encoding","UTF-8");
iconv_set_encoding("internal_encoding","UTF-8");
iconv_set_encoding("output_encoding","UTF-8");
$xml = simplexml_load_file("kanjidic2.xml") or die("error: can't create");
foreach ($xml->children() as $kanji) {
	$mykanji = $kanji->literal;
	//echo $mykanji . "<br>";
	$myrads="";
	foreach($kanji->radical->rad_value as $radicals) {
	//	echo $radicals . "<br>";
		$myrads = $radicals . "," . $myrads;
		$myrads = trim($myrads,",");
	}
//	echo $kanji->misc->grade . "<br>";
	$mygrade = $kanji->misc->grade;
//	echo $kanji->misc->stroke_count . "<br>";
	$mysc = $kanji->misc->stroke_count;
	$myreading="";
	foreach($kanji->reading_meaning->rmgroup->reading as $reading) {
//		echo $reading . "<br>";
		$myreading = $reading . ", " . $myreading;
		$myreading = trim($myreading,", ");
	}
	$mymeaning = " ";
	foreach($kanji->reading_meaning->rmgroup->meaning as $meaning) {
//		echo $meaning . "<br>";
		$mymeaning = $meaning . ", " . $mymeaning;
		$mymeaning = trim($mymeaning, ", ");
	}
	$result = mysqli_query($con,"SELECT kanji from kanjiinfo WHERE kanji='$mykanji'");
	$row = mysqli_num_rows($result);
	if($row > 0) {
		echo "kanji in table already <br/>";
	}
	else {
		$query = "INSERT INTO kanjiinfo(id,kanji,radicals,grade_level,sc,readings,meanings) VALUES(NULL,'$mykanji','$myrads','$mygrade','$mysc','$myreading','$mymeaning')";
		$result = mysqli_query($con,$query);
		if($result) {
			echo "success <br/>";
		}
	}
	
	//echo $kanji->codepoint->cp_value[0] . "<br>";
}
?>
</body>
</html>
