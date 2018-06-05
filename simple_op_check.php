<?php
	session_start();
	/*$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pe6p";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }*/
  if (isset($_POST['Enviar'])) {
  		$level = $_SESSION['global_level'];
	  $realresult = $_SESSION['realresult'];
		$op_string = $_SESSION['opdata'];
		$score = 0;
		$answers = array();
		for ($c=1; $c < 11; $c++) {
			$ans=$_POST['answer'.$c];
			array_push($answers, $ans);
		}
		/*---- Evaluación ----*/
		for ($check=0; $check < 10; $check++) {
			if ($answers[$check] == $realresult[$check]){
				$score = $score + 1;
			}
			else{
				$score = $score +0;
			}
		}
		$times = 1;
		switch ($level) {
			case 1:
				// $user = $_SESSION['idusername'];
				// $sql_progress = "SELECT * FROM progress WHERE iduser = '$user'";
				// $result_progress= $conn->query($sql_progress);
				// if($result_progress->num_rows > 0){
				// 	$row_progress = $result_progress->fetch_assoc();
				// 	$old_score = $row_progress['simopeasyprom'];
				// 	$new_score = $old_score + $score;
				// 	$old_times = $row_progress['simopeasyt'];
				// 	$new_times = $old_times + 1;
				// 	$sql_progressiii = "UPDATE progress SET simopeasyt='$new_times', simopeasyprom='$new_score' WHERE iduser=$user";
				//
				// 	$result3= $conn->query($sql_progressiii);
				// }
				// else{
				// 	$sql_progressii = "INSERT INTO progress (iduser, simopeasyt, simopeasyprom) VALUES ('$user', '$times', '$score')";
				// 	$result2= $conn->query($sql_progressii);}
				break;
			case 2:
				// $user = $_SESSION['idusername'];
				// $sql_progress = "SELECT * FROM progress WHERE iduser = '$user'";
				// $result_progress= $conn->query($sql_progress);
				// echo $score;
				// if($result_progress->num_rows > 0){
				// 	echo "pueba";
				// 	$row_progress = $result_progress->fetch_assoc();
				// 	$old_score = $row_progress['simopnormalprom'];
				// 	$new_score = $old_score + $score;
				// 	$old_times = $row_progress['simopnormalt'];
				// 	$new_times = $old_times + 1;
				// 	$sql_progressiii = "UPDATE progress SET simopnormalt='$new_times', simopnormalprom='$new_score' WHERE iduser=$user";
				//
				// 	$result3= $conn->query($sql_progressiii);
				// }
				// else{
				// 	$sql_progressii = "INSERT INTO progress (iduser, simopnormalt, simopnormalprom) VALUES ('$user', '$times', '$score')";
				// 	$result2= $conn->query($sql_progressii);}
				break;
			case 3:
				// $user = $_SESSION['idusername'];
				// $sql_progress = "SELECT * FROM progress WHERE iduser = '$user'";
				// $result_progress= $conn->query($sql_progress);
				// echo $score;
				// if($result_progress->num_rows > 0){
				// 	echo "pueba";
				// 	$row_progress = $result_progress->fetch_assoc();
				// 	$old_score = $row_progress['simophardprom'];
				// 	$new_score = $old_score + $score;
				// 	$old_times = $row_progress['simophardt'];
				// 	$new_times = $old_times + 1;
				// 	$sql_progressiii = "UPDATE progress SET simophardt='$new_times', simophardprom='$new_score' WHERE iduser=$user";
				//
				// 	$result3= $conn->query($sql_progressiii);
				// }
				// else{
				// 	$sql_progressii = "INSERT INTO progress (iduser, simophardt, simophardprom) VALUES ('$user', '$times', '$score')";
				// 	$result2= $conn->query($sql_progressii);}
				break;
		}
  }



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
<div class="container">
	<div class="navbar">

	</div>
	<div class="description">
	<h1>OPERACIONES ARITMETICAS BASICAS</h1>
	<br>
	<p>Estos son los resultados de tu prueba.
	</div>
	<div class="simple_op_check_table">
		<table>
		<tr>
				<th>No.</th>
				<th>OPERACION</th>
				<th>TU RESPUESTA</th>
				<th>RESULTADO</th>
			</tr>
	<?php
		for ($show=0; $show < 10; $show++) {
		?>
			<tr>
				<td><?php echo ($show+1); ?></td>
				<td><?php echo ($op_string[$show]);?></td>
				<td><?php echo ($answers[$show]);?></td>
				<td><?php echo ($realresult[$show]);?></td>
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
