<script>
$(document).ready(function() {
	$('#myquiz').on('click','button',function() {
		var x = document.getElementById("myanswer").value;
		if(x === "") {
			return false;
		}
		var y = document.getElementById("next").value;
		var z = document.getElementById("myanswer").name;
		var grade = document.getElementById("next").name;
		$.post("glgrade_me.php", {k_id: y, ans: x, que: z, grade: grade}, function(data){
			$('#old').html(data);	
		});
		$.post("newglquest.php", {grade: grade}, function(data) {
			$('#question').html(data);
		});
	});
});
$(document).ready(function(){

	$("form").submit(function(){
		var x = document.getElementById("myanswer").value;
		if(x === "") {
			return false;
		}
		var y = document.getElementById("next").value;
		var z = document.getElementById("myanswer").name;
		var grade = document.getElementById("next").name;
		$.post("glgrade_me.php", {k_id: y, ans: x, que: z, grade: grade}, function(data){
			$('#old').html(data);	
		});
		$.post("newglquest.php", {grade: grade}, function(data) {
			$('#question').html(data);
		});
		return false;
	});
});
</script>
<?php
	include "database_connector.php";
	$grade = $_POST['grade'];
	$temp = mysqli_query($con, "SELECT * FROM kanjiinfo WHERE grade_level BETWEEN 1 and $grade");
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
	$num = rand(0, (count($kanji)-1));
	$num2 = rand(1,3);
	}
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
			<button name="<?php echo $grade; ?>" id="next" type='button' class='btn btn-default' value="<?php echo $num;?>">Next</button>
	  </div>
	</form>
	</div>
