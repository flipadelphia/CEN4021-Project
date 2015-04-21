<html>
<header>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</header>
<body>
<?php
include 'database_connector.php';
header( 'Content-Type: text/html; charset=UTF-8' );
$result = mysqli_query($con,"SET NAMES UTF-8");
$result = mysqli_query($con,"Set CHARACTER SET UTF-8");
iconv_set_encoding("input_encoding","UTF-8");
iconv_set_encoding("internal_encoding","UTF-8");
iconv_set_encoding("output_encoding","UTF-8");
$j=0;
$k=0;
$temp = 'U+2FD';
echo '<br/>';
	for($j;$j<16;$j++) { 
		if($j==10) {
			$blah2 = 'A';
		}
		else if ($j==11){
			$blah2 = 'B';
		}
		else if ($j==12) {
			$blah2 = 'C';
		}
		else if ($j==13) {
			$blah2 = 'D';
		}
		else if ($j==14) {
			$blah2 = 'E';
		}
		else if ($j==15) {
			$blah2 = 'F';
		}
		else {
			$blah2 = $j;
		}
			
		$utf= preg_replace("/U\+([0-9A-F]*)/"
        	,"&#x\\1;"
        	,$temp . $blah2
		);
		//echo $utf;
		//$utf = utf8_encode($utf);
		iconv("ASCII","UTF-8",$utf);
		echo $utf . "<br/>";
/*$result = mysqli_query($con,"select * from radicals where radicals='$utf'");
$rows = mysqli_num_rows($result);
	if($rows == 0) {
		$result2 = mysqli_query($con,"INSERT INTO radicals values('$j','$utf')");
		if($result) {
			echo "succeed\n";
		}
	}*/
	}
?>
</body>
</html>
