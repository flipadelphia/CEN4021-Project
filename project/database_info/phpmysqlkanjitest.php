<!DOCTYPE HTML>
<html>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<body>
<?php
include 'database_connector.php';
header('Content-type: text/html; charset=utf-8');
$result = mysqli_query($con,"SET NAMES UTF-8");
$result = mysqli_query($con,"Set CHARACTER SET UTF-8");
iconv_set_encoding("input_encoding","UTF-8");
iconv_set_encoding("internal_encoding","UTF-8");
iconv_set_encoding("output_encoding","UTF-8");
$xml = simplexml_load_file("JMdict_e.xml") or die("error: can't create");
var_dump ($xml->entry[8]);
var_dump ($xml->entry[7]);
var_dump ($xml->entry[9]);

$re_nokanji;
$j = 0;
set_time_limit(0);
//for ($j; $j < 196; $j++) {
/*foreach($xml->children() as $words) {
$keb="";
$ke_inf="";
$ke_pri;
$reb;
if($words->k_ele) {
	foreach($words->k_ele as $temp) {
		if($temp->keb) {
		//	echo "$j keb field: <br>";
			$keb = $temp->keb . "/" . $keb;
			$keb = trim($keb, "/");
	//		echo $keb . "<br>";
		}
		else {
			$keb = NULL;
		}
		if($temp->ke_inf) {
			foreach($temp->ke_inf as $temp2) {
	//			echo "$j ke_inf: <br>";
				$ke_inf = $temp->ke_inf;
	//			echo $ke_inf . "<br>";
			}
		}
		else {
			$ke_inf = NULL;
		}
	}
}
if($words->r_ele) {
	foreach($words->r_ele as $temp) {
		if($temp->reb) {
		//	echo "$j reb field: <br>";
			$reb = $temp->reb;
		//	echo $reb . "<br>";
		}
		else {
			$reb = NULL;
		}
		if($temp->re_nokanji) {
		//	echo "$j re_nokanji field: <br>";
			$re_nokanji = $temp->re_nokanji;
		//	echo $re_nokanji . "<br>";
		}
	}
}
$pos;
$xref;
$xref2="";
$gloss;
$gloss2="";
if($words->sense) {
	$brah = 1;
	foreach($words->sense as $temp) {
		if($brah == 1) {
			if($temp->xref) {
				$xref = $temp->xref;
			//	echo "$j xref field: <br>";
			//	echo $xref . "<br>";
			}
			else {
				$xref = NULL;
			}
			if($temp->gloss) {
				$gloss = $temp->gloss;
			//	echo "$j gloss field: <br>";
			//	echo $gloss . "<br>";
			}
			else {
				$gloss = NULL;
			}
			$brah = 2;
		}
		else {
			if($temp->xref) {
				$xref2 = $temp->xref . "," . $xref2;
				$xref2 = trim($xref2, ",");
			//	echo "$j xref field: <br>";
			//	echo $xref2 . "<br>";
			}
			if($temp->gloss) {
				$gloss2 = $temp->gloss . "," . $gloss2;
				$gloss2 = trim($gloss2, ",");
			//	echo "$j gloss field: <br>";
			//	echo $gloss2 . "<br>";
			}
		}	
	}
}*/
/*$j++;
if($j>100) {
	exit();
}*/
//$result = mysqli_query($con,"SELECT FROM dictionary WHERE kanji_word='$keb'");
//$rows = mysqli_num_rows($result);
//if($rows == 0) {
/*	$query = "INSERT INTO dictionary VALUES(NULL,'$keb','$ke_inf','$reb','$xref','$gloss','$xref2','$gloss2')";
	mysqli_query($con,$query);
//}

}*/
//}
//echo $xml->entry[8]->r_ele->reb . "\n"
echo "finished<br>";
?>
</body>
</html>
