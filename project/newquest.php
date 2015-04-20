<script>
$(document).ready(function() {
	$('#myquiz').on('click','button',function() {
		var x = document.getElementById("myanswer").value;
		var y = document.getElementById("next").value;
		var z = document.getElementById("myanswer").name;
		$.post("grade_me.php", {k_id: y, ans: x, que: z}, function(data){
			$('#old').html(data);	
		});
		$.post("newquest.php", function(data) {
			$('#question').html(data);
		});
	});
});
$(document).ready(function(){

	$("form").submit(function(){
		var x = document.getElementById("myanswer").value;
		var y = document.getElementById("next").value;
		var z = document.getElementById("myanswer").name;
		$.post("grade_me.php", {k_id: y, ans: x, que: z}, function(data){
			$('#old').html(data);	
		});
		$.post("newquest.php", function(data) {
			$('#question').html(data);
		});
		return false;
	});
});
</script>
<?php
	include "database_connector.php";
	$temp = mysqli_query($con,"SELECT * FROM kanjiinfo WHERE grade_level > 0");
	if($temp) {
		$kanji = array();
		$sc = array();
		$meanings = array();
		$readings = array();
		while($row = mysqli_fetch_array($temp)){
			array_push($kanji, $row[1]);
			array_push($sc, $row[4]);
			array_push($meanings, $row[6]);
			array_push($readings, $row[5]);
		}	
	//	echo count($kanji);
	//	echo count($sc);
	}
	$num = rand(0, (count($kanji)-1));
//	echo $num;
	$num2 = rand(1, 3);
?>
<div id="question" class="col-sm-4">
<form role="form" class="form-inline">
	  <div id='myquiz' class="form-group">
	  <p >  <?php echo $kanji[$num]?> </p>
	<?php 
		if($num2 == 1) {
		echo "<label> How many strokes? </label>";
	        echo "<input type='text' id='myanswer' name='1' class='form-control'> </input>";
		}
		if($num2 == 2) {
		echo "<label> What is the meaning? </label>";
	        echo "<input type='text' id='myanswer' name='2' class='form-control'> </input>";
		}
		if($num2 == 3) {
		echo "<label> What is a reading? </label>";
	        echo "<input type='text' id='myanswer' name='3' class='form-control'> </input>";
		}
		?>
			<button id="next" type='button' class='btn btn-default' value="<?php echo $num;?>">Next</button>
	  </div>
	</form>
</div>
