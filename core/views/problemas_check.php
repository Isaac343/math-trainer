<?php
	session_start();
	$problem_real_result = $_SESSION['problem_real_result'];
	$problem_data = $_SESSION['problem_data'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pe6p";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
	$answers = array();
	for ($c=0; $c < 5; $c++) { 
		$ans=$_POST['answer'.$c];
		array_push($answers, $ans);
	}	
	/*---- Comparación ----*/
	$score = 0;
	for ($check=0; $check < 5; $check++) { 
		if ($answers[$check] == $problem_real_result[$check]){
			$score = $score + 2;
		}else{
				$score = $score +0;
			}
	}
	$times = 1;
	$user = $_SESSION['idusername'];
	$sql_progress = "SELECT * FROM progress WHERE iduser = '$user'";
	$result_progress= $conn->query($sql_progress);
	
	if($result_progress->num_rows > 0){
		
		$row_progress = $result_progress->fetch_assoc();
		$old_score = $row_progress['problemsprom'];
		$new_score = $old_score + $score;
		$old_times = $row_progress['problemstimes'];
		$new_times = $old_times + 1;
		$sql_progressiii = "UPDATE progress SET problemstimes='$new_times', problemsprom='$new_score' WHERE iduser=$user"; 
					
		$result3= $conn->query($sql_progressiii);
	}	
	else{
		$sql_progressii = "INSERT INTO progress (iduser, problemstimes, problemsprom) VALUES ('$user', '$times', '$score')";
		$result2= $conn->query($sql_progressii);}

?>
<!DOCTYPE html>
<html>
<head>
	<title>PE6°P</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<div class="navbar">
	</div>
	<div class="description">
	<h1>PROBLEMAS MATEMATICOS</h1>
	<br>
	<p>Estos son los resultados de tu prueba.
	</div>
	<div class="simple_op_check_table">
		<table>
		<tr>
				<th>PROBLEMA</th>
				<th>TU RESPUESTA</th>
				<th>RESULTADO</th>
			</tr>
	<?php
		for ($show=0; $show < 5; $show++) { 
		?>
			<tr>
				<td><?php echo ($problem_data[$show]);?></td>
				<td><?php echo ($answers[$show]);?></td>
				<td><?php echo ($problem_real_result[$show]);?></td>
			</tr>
	<?php
		}
	?>
			<tr>
				<td></td>	
				<td>Calificacion</td>
				<td><?php echo ($score); ?></td>
			</tr>
		</table>	
	</div>
	<div class="action">
		<a href="asd.php"><input type="submit" value="Salir"></a> 
	</div>
</div>

</body>
</html>