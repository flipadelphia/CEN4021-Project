<html>
<meta charset="utf8">
<head><title>Kanji Tools</title>
<link href="http://fonts.googleapis.com/css?family=Lobster" rel"stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/mycss.css">
<meta name="viewpoint" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"> </script>
<script>
$(document).ready(function (){
		$('#rad_tab').on('click', 'td',  function() {
			var x = this.id;
		//	if(this.innerHTML == "lol") {
			$.post("kanjibyradical.php", {rad_id: this.id}, function(data) {
					$("#replaceme").html(data);					//alert(data);		
				});
			//}
			
		});
});
</script>
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
            <li class="active"><a href="byradical.php">Search by Radical</a></li>
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
            <li><a href="quiz.php" target="main">Take a Quiz</a></li>
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
    <li> Kanji Search Navigation <li>
    <li> <a href=meaning.php> Search Kanji By Meaning </a> </li>
    <li class="active"> <a href=hiragana.php> Search Kanji By Reading </a> </li>
    <li> <a href=byradical.php> Search Kanji By Radical </a> </li>
    <li> <a href=stroke.php> Search Kanji By Stroke Count </a> </li>
   </ul>
   <br>
   <ul class="nav nav-sidebar">
    <li> External Links </li>
    <li> <a href="http://www.kanjialive.com"> Kanji Alive </a> </li>
    <li> <a href="http://www.edrdg.org/jmdict/j_jmdict.html"> JMDict </a> </li>
   </ul>
   <br>
   <ul class="nav nav-sidebar">
    <li> <a> </a> </li>
    <li> <a href="index.html"> Kanji Tools </a> </li>
    <li> <a href="flipadelphia.html"> Flipadelphia </a> </li>
   </ul>
  </div>
  <div class="col-sm-9 ">
	<div id="replaceme">
	<h1> Search For Kanji By Radical </h1>
	<h3> All kanji are made up of different radicals, so click the radical that your kanji uses.</h3>
	</div>
<?php 
	include "database_connector.php";
	$radicals = array();
	$temp = mysqli_query($con, "SELECT * FROM rads WHERE id>0"); 
	if($temp) {
		while($row = mysqli_fetch_array($temp)) {
			array_push($radicals,"$row[1]");
		}
	}
	//echo count($radicals);
	
?>
	<div id="rad_tab">
	<div class="panel panel-primary">
	<div class="panel-heading"> 1 Stroke </div>
	<table class="table table-hover">
	<tbody>
	<tr><td id="1"><?php echo "$radicals[0]"; ?></td> 
	<td id="2"><?php echo "$radicals[1]"; ?></td> 
	<td id="3"><?php echo "$radicals[2]"; ?></td>
	<td id="4"><?php echo "$radicals[3]"; ?></td>
	<td id="5"><?php echo "$radicals[4]"; ?></td> 
	<td id="6"><?php echo "$radicals[5]"; ?></td> </tr>
	</tbody> </table> </div>
	<div class="panel panel-primary">
	<div class="panel-heading"> 2 Strokes </div>
	<table class="table table-hover">
	<tbody>
	<tr>
	<td id="7"><?php echo "$radicals[6]"; ?></td> 
	<td id="8"><?php echo "$radicals[7]"; ?></td> 
	<td id="9"><?php echo "$radicals[8]"; ?></td> 
	<td id="10"><?php echo "$radicals[9]"; ?></td> 
	<td id="11"><?php echo "$radicals[10]"; ?></td> 
	<td id="12"><?php echo "$radicals[11]"; ?></td> 
	<td id="13"><?php echo "$radicals[12]"; ?></td> 
	<td id="14"><?php echo "$radicals[13]"; ?></td> 
	<td id="15"><?php echo "$radicals[14]"; ?></td> 
	<td id="16"><?php echo "$radicals[15]"; ?></td> 
	<td id="17"><?php echo "$radicals[16]"; ?></td> 
	<td id="18"><?php echo "$radicals[17]"; ?></td> </tr>
	<tr> 
	<td id="19"><?php echo "$radicals[18]"; ?></td> 
	<td id="20"><?php echo "$radicals[19]"; ?></td> 
	<td id="21"><?php echo "$radicals[20]"; ?></td> 
	<td id="22"><?php echo "$radicals[21]"; ?></td> 
	<td id="23"><?php echo "$radicals[22]"; ?></td> 
	<td id="24"><?php echo "$radicals[23]"; ?></td> 
	<td id="25"><?php echo "$radicals[24]"; ?></td> 
	<td id="26"><?php echo "$radicals[25]"; ?></td> 
	<td id="27"><?php echo "$radicals[26]"; ?></td> 
	<td id="28"><?php echo "$radicals[27]"; ?></td> 
	<td id="29"><?php echo "$radicals[28]"; ?></td> </tr>
	</tbody> </table> </div>
	<div class="panel panel-primary">
	<div class="panel-heading"> 3 Strokes </div>
	<table class="table table-hover">
	<tbody> <tr>
	<td id="30"><?php echo "$radicals[29]"; ?></td>  
	<td id="31"><?php echo "$radicals[30]"; ?></td> 
	<td id="32"><?php echo "$radicals[31]"; ?></td> 
	<td id="33"><?php echo "$radicals[32]"; ?></td> 
	<td id="34"><?php echo "$radicals[33]"; ?></td> 
	<td id="35"><?php echo "$radicals[34]"; ?></td> 
	<td id="36"><?php echo "$radicals[35]"; ?></td> 
	<td id="37"><?php echo "$radicals[36]"; ?></td> 
	<td id="38"><?php echo "$radicals[37]"; ?></td> 
	<td id="39"><?php echo "$radicals[38]"; ?></td>
	<td id="40"><?php echo "$radicals[39]"; ?></td> </tr>
	<tr>
	<td id="41"><?php echo "$radicals[40]"; ?></td> 
	<td id="42"><?php echo "$radicals[41]"; ?></td> 
	<td id="43"><?php echo "$radicals[42]"; ?></td> 
	<td id="44"><?php echo "$radicals[43]"; ?></td> 
	<td id="45"><?php echo "$radicals[44]"; ?></td> 
	<td id="46"><?php echo "$radicals[45]"; ?></td> 
	<td id="47"><?php echo "$radicals[46]"; ?></td> 
	<td id="48"><?php echo "$radicals[47]"; ?></td> 
	<td id="49"><?php echo "$radicals[48]"; ?></td> 
	<td id="50"><?php echo "$radicals[49]"; ?></td> 
	<td id="51"><?php echo "$radicals[50]"; ?></td> </tr>
	<tr>
	<td id="52"><?php echo "$radicals[51]"; ?></td> 
	<td id="53"><?php echo "$radicals[52]"; ?></td> 
	<td id="54"><?php echo "$radicals[53]"; ?></td> 
	<td id="55"><?php echo "$radicals[54]"; ?></td> 
	<td id="56"><?php echo "$radicals[55]"; ?></td> 
	<td id="57"><?php echo "$radicals[56]"; ?></td> 
	<td id="58"><?php echo "$radicals[57]"; ?></td> 
	<td id="59"><?php echo "$radicals[58]"; ?></td> 
	<td id="60"><?php echo "$radicals[59]"; ?></td> </tr>
	</tbody> </table> </div>
	<div class="panel panel-primary">
	<div class="panel-heading"> 4 Strokes </div>
	<table class="table table-hover">
	<tbody> <tr>
	<td id="61"><?php echo "$radicals[60]"; ?></td> 
	<td id="62"><?php echo "$radicals[61]"; ?></td> 
	<td id="63"><?php echo "$radicals[62]"; ?></td> 
	<td id="64"><?php echo "$radicals[63]"; ?></td> 
	<td id="65"><?php echo "$radicals[64]"; ?></td> 
	<td id="66"><?php echo "$radicals[65]"; ?></td> 
	<td id="67"><?php echo "$radicals[66]"; ?></td> 
	<td id="68"><?php echo "$radicals[67]"; ?></td> 
	<td id="69"><?php echo "$radicals[68]"; ?></td> 
	<td id="70"><?php echo "$radicals[69]"; ?></td> 
	<td id="71"><?php echo "$radicals[70]"; ?></td> 
	<td id="72"><?php echo "$radicals[71]"; ?></td> </tr>
	<tr>
	<td id="73"><?php echo "$radicals[72]"; ?></td> 
	<td id="74"><?php echo "$radicals[73]"; ?></td> 
	<td id="75"><?php echo "$radicals[74]"; ?></td> 
	<td id="76"><?php echo "$radicals[75]"; ?></td> 
	<td id="77"><?php echo "$radicals[76]"; ?></td> 
	<td id="78"><?php echo "$radicals[77]"; ?></td> 
	<td id="79"><?php echo "$radicals[78]"; ?></td> 
	<td id="80"><?php echo "$radicals[79]"; ?></td> 
	<td id="81"><?php echo "$radicals[80]"; ?></td> 
	<td id="82"><?php echo "$radicals[81]"; ?></td> 
	<td id="83"><?php echo "$radicals[82]"; ?></td> 
	<td id="84"><?php echo "$radicals[83]"; ?></td>  </tr>
	<tr>
	<td id="85"><?php echo "$radicals[84]"; ?></td> 
	<td id="86"><?php echo "$radicals[85]"; ?></td>
	<td id="87"><?php echo "$radicals[86]"; ?></td> 
	<td id="88"><?php echo "$radicals[87]"; ?></td> 
	<td id="89"><?php echo "$radicals[88]"; ?></td> 
	<td id="90"><?php echo "$radicals[89]"; ?></td> 
	<td id="91"><?php echo "$radicals[90]"; ?></td> 
	<td id="92"><?php echo "$radicals[91]"; ?></td> 
	<td id="93"><?php echo "$radicals[92]"; ?></td> 
	<td id="94"><?php echo "$radicals[93]"; ?></td> 
	<td id="95"><?php echo "$radicals[94]"; ?></td> </tr>
	</tbody> </table> </div> 
	<div class="panel panel-primary">
	<div class="panel-heading"> 5 Strokes </div>
	<table class="table table-hover">
	<tbody>
	<tr>
	<td id="96"><?php echo "$radicals[95]"; ?></td> 
	<td id="97"><?php echo "$radicals[96]"; ?></td> 
	<td id="98"><?php echo "$radicals[97]"; ?></td> 
	<td id="99"><?php echo "$radicals[98]"; ?></td> 
	<td id="100"><?php echo "$radicals[99]"; ?></td> 
	<td id="101"><?php echo "$radicals[100]"; ?></td> 
	<td id="102"><?php echo "$radicals[101]"; ?></td> 
	<td id="103"><?php echo "$radicals[102]"; ?></td>
	<td id="104"><?php echo "$radicals[103]"; ?></td>
	<td id="105"><?php echo "$radicals[104]"; ?></td> 
	<td id="106"><?php echo "$radicals[105]"; ?></td> </tr>
	<tr>
	<td id="107"><?php echo "$radicals[106]"; ?></td> 
	<td id="108"><?php echo "$radicals[107]"; ?></td> 
	<td id="109"><?php echo "$radicals[108]"; ?></td> 
	<td id="110"><?php echo "$radicals[109]"; ?></td> 
	<td id="111"><?php echo "$radicals[110]"; ?></td> 
	<td id="112"><?php echo "$radicals[111]"; ?></td> 
	<td id="113"><?php echo "$radicals[112]"; ?></td> 
	<td id="114"><?php echo "$radicals[113]"; ?></td> 
	<td id="115"><?php echo "$radicals[114]"; ?></td> 
	<td id="116"><?php echo "$radicals[115]"; ?></td> 
	<td id="117"><?php echo "$radicals[116]"; ?></td> 
	</tr>
	</tbody> </table> </div>
	<div class="panel panel-primary">
	<div class="panel-heading"> 6 Strokes </div>
	<table class="table table-hover">
	<tbody> <tr>
	<td id="118"><?php echo "$radicals[117]"; ?></td>
	<td id="119"><?php echo "$radicals[118]"; ?></td> 
	<td id="120"><?php echo "$radicals[119]"; ?></td> 
	<td id="121"><?php echo "$radicals[120]"; ?></td> 
	<td id="122"><?php echo "$radicals[121]"; ?></td> 
	<td id="123"><?php echo "$radicals[122]"; ?></td> 
	<td id="124"><?php echo "$radicals[123]"; ?></td> 
	<td id="125"><?php echo "$radicals[124]"; ?></td> 
	<td id="126"><?php echo "$radicals[125]"; ?></td> 
	<td id="127"><?php echo "$radicals[126]"; ?></td> 
	<td id="128"><?php echo "$radicals[127]"; ?></td></tr> 
	<tr>
	<td id="129"><?php echo "$radicals[128]"; ?></td>
	<td id="130"><?php echo "$radicals[129]"; ?></td>  
	<td id="131"><?php echo "$radicals[130]"; ?></td> 
	<td id="132"><?php echo "$radicals[131]"; ?></td> 
	<td id="133"><?php echo "$radicals[132]"; ?></td> 
	<td id="134"><?php echo "$radicals[133]"; ?></td> 
	<td id="135"><?php echo "$radicals[134]"; ?></td> 
	<td id="136"><?php echo "$radicals[135]"; ?></td> 
	<td id="137"><?php echo "$radicals[136]"; ?></td> 
	<td id="138"><?php echo "$radicals[137]"; ?></td> 
	<td id="139"><?php echo "$radicals[138]"; ?></td></tr>
	<tr>
	<td id="140"><?php echo "$radicals[139]"; ?></td>
	<td id="141"><?php echo "$radicals[140]"; ?></td> 
	<td id="142"><?php echo "$radicals[141]"; ?></td> 
	<td id="143"><?php echo "$radicals[142]"; ?></td> 
	<td id="144"><?php echo "$radicals[143]"; ?></td> 
	<td id="145"><?php echo "$radicals[144]"; ?></td> 
	<td id="146"><?php echo "$radicals[145]"; ?></td> 
	</tr>
	</tbody> </table> </div>
	<div class="panel panel-primary">
	<div class="panel-heading"> 7 Strokes </div>
	<table class="table table-hover">
	<tbody> <tr>
	<td id="147"><?php echo "$radicals[146]"; ?></td> 
	<td id="148"><?php echo "$radicals[147]"; ?></td> 
	<td id="149"><?php echo "$radicals[148]"; ?></td> 
	<td id="150"><?php echo "$radicals[149]"; ?></td> 
	<td id="151"><?php echo "$radicals[150]"; ?></td> 
	<td id="152"><?php echo "$radicals[151]"; ?></td> 
	<td id="153"><?php echo "$radicals[152]"; ?></td> 
	<td id="154"><?php echo "$radicals[153]"; ?></td> 
	<td id="155"><?php echo "$radicals[154]"; ?></td> 
	<td id="156"><?php echo "$radicals[155]"; ?></td> 
	<td id="157"><?php echo "$radicals[156]"; ?></td> </tr>
	<tr>
	<td id="158"><?php echo "$radicals[157]"; ?></td> 
	<td id="159"><?php echo "$radicals[158]"; ?></td> 
	<td id="160"><?php echo "$radicals[159]"; ?></td> 
	<td id="161"><?php echo "$radicals[160]"; ?></td> 
	<td id="162"><?php echo "$radicals[161]"; ?></td> 
	<td id="163"><?php echo "$radicals[162]"; ?></td> 
	<td id="164"><?php echo "$radicals[163]"; ?></td> 
	<td id="165"><?php echo "$radicals[164]"; ?></td> 
	<td id="166"><?php echo "$radicals[165]"; ?></td> <tr>
	</tbody> </table> </div>
	<div class="panel panel-primary">
	<div class="panel-heading"> 8 Strokes </div>
	<table class="table table-hover">
	<tbody> <tr>
	<td id="167"><?php echo "$radicals[166]"; ?></td> 
	<td id="168"><?php echo "$radicals[167]"; ?></td> 
	<td id="169"><?php echo "$radicals[168]"; ?></td> 
	<td id="170"><?php echo "$radicals[169]"; ?></td> 
	<td id="171"><?php echo "$radicals[170]"; ?></td> 
	<td id="172"><?php echo "$radicals[171]"; ?></td>
	<td id="173"><?php echo "$radicals[172]"; ?></td> 
	<td id="174"><?php echo "$radicals[173]"; ?></td> 
	<td id="175"><?php echo "$radicals[174]"; ?></td> </tr>
	</tbody> </table> </div>
	<div class="panel panel-primary">
	<div class="panel-heading"> 9 Strokes </div>
	<table class="table table-hover">
	<tbody> <tr>
	<td id="176"><?php echo "$radicals[175]"; ?></td> 
	<td id="177"><?php echo "$radicals[176]"; ?></td> 
	<td id="178"><?php echo "$radicals[177]"; ?></td> 
	<td id="179"><?php echo "$radicals[178]"; ?></td> 
	<td id="180"><?php echo "$radicals[179]"; ?></td> 
	<td id="181"><?php echo "$radicals[180]"; ?></td> 
	<td id="182"><?php echo "$radicals[181]"; ?></td> 
	<td id="183"><?php echo "$radicals[182]"; ?></td> 
	<td id="184"><?php echo "$radicals[183]"; ?></td>
	<td id="185"><?php echo "$radicals[184]"; ?></td> 
	<td id="186"><?php echo "$radicals[185]"; ?></td> </tr>
	</tbody> </table> </div>
	<div class="panel panel-primary">
	<div class="panel-heading"> 10 Strokes </div>
	<table class="table table-hover">
	<tbody> <tr>
	<td id="187"><?php echo "$radicals[186]"; ?></td> 
	<td id="188"><?php echo "$radicals[187]"; ?></td> 
	<td id="189"><?php echo "$radicals[188]"; ?></td> 
	<td id="190"><?php echo "$radicals[189]"; ?></td> 
	<td id="191"><?php echo "$radicals[190]"; ?></td> 
	<td id="192"><?php echo "$radicals[191]"; ?></td> 
	<td id="193"><?php echo "$radicals[192]"; ?></td> 
	<td id="194"><?php echo "$radicals[193]"; ?></td> </tr> 
	</tbody> </table> </div> 
	<div class="panel panel-primary">
	<div class="panel-heading"> 11 Strokes </div>
	<table class="table table-hover">
	<tbody> <tr>
	<td id="195"><?php echo "$radicals[194]"; ?></td>
	<td id="196"><?php echo "$radicals[195]"; ?></td> 
	<td id="197"><?php echo "$radicals[196]"; ?></td> 
	<td id="198"><?php echo "$radicals[197]"; ?></td> 
	<td id="199"><?php echo "$radicals[198]"; ?></td> 
	<td id="200"><?php echo "$radicals[199]"; ?></td> 
	<td id="201"><?php echo "$radicals[200]"; ?></td>
	<td id="202"><?php echo "$radicals[201]"; ?></td> 
	<td id="203"><?php echo "$radicals[202]"; ?></td> </tr>
	</tbody> </table> </div> 
	<div class="panel panel-primary">
	<div class="panel-heading"> 12 Strokes or more </div>
	<table class="table table-hover">
	<tbody>
	<tr>
	<td id="204"><?php echo "$radicals[203]"; ?></td>
	<td id="205"><?php echo "$radicals[204]"; ?></td> 
	<td id="206"><?php echo "$radicals[205]"; ?></td>
	<td id="207"><?php echo "$radicals[206]"; ?></td> 
	<td id="208"><?php echo "$radicals[207]"; ?></td> 
	<td id="209"><?php echo "$radicals[208]"; ?></td> 
	<td id="210"><?php echo "$radicals[209]"; ?></td> 
	<td id="211"><?php echo "$radicals[210]"; ?></td> 
	<td id="212"><?php echo "$radicals[211]"; ?></td> 
	<td id="213"><?php echo "$radicals[212]"; ?></td> 
	<td id="214"><?php echo "$radicals[213]"; ?></td> 
	</tr>
	</tbody> </table> </div>
	</div>
  </div>
 </div>
</div>
</body>
</html>
