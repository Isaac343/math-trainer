<?php
session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pe6p";
	$answers = array();
	if (isset($_SESSION['problem_real_result']) and isset($_SESSION['problem_data'])){
		unset($_SESSION['problem_real_result']);
		unset($_SESSION['problem_data']);
	}
	$problem_real_result = array();
	$problem_data = array();
	$result = 0;
?>
<!DOCTYPE html>
<html>
<head>
	<title>PLATAFORMA EDUCATIVA</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
	<div class="main-container">
	<div class="description">
	<h1>PROBLEMAS MATEMATICOS</h1>
	<br>
	<p>Resuelve los siguientes porblemas matemáticos. Puedes hacer las operaciones a mano.
	</div>
		<div class="tab-content">
			<div class="problemc">
			<form action="problemas_check.php" method="POST">
			<table>
				<tr>
					<th>No.</th>
					<th>PROBLEMA</th>
					<th>TU RESPUESTA</th>
				</tr>
				<?php
					for ($i=0; $i < 5; $i++) {
						$problemnumer = rand(1,15);
						switch ($problemnumer) {
							case 1:
								$a = rand(1000,2000);
								$multiplicador = rand(2,4);
								$b = $a*$multiplicador;
								$data = 'Gloria compra celulares en $'.$a.' y los vende en $'.$b.'<br>¿De cuanto fue su ganancia?';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								$result = $b - $a;
								array_push($problem_real_result, $result);
								array_push($problem_data, $data);
								break;
							case 2:
								$a = rand(100,900);
								$b = rand(400,800);
								$c = rand(1000,3000);
								$d = rand(700,4000);
								$data = 'Una llave de agua es abierta y vierte las sigueintes cantidades de agua durante el día '.$a.'L, '.$b.'L, '.$c.'L y '.$d.'L<br>¿Cuantos litros de agua se usaron en total?';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								$result = $a+$b+$c+$d;
								array_push($problem_real_result, $result);
								array_push($problem_data, $data);
								break;
							case 3:
								$a = rand(2000,3000);
								$b = rand(2500,3000);
								$c = rand(4000,7000);
								$data = 'En un estadio de futbol entraron al primer nivel '.$c.' personas, en el segundo nivel '.$b.' y en el tercer nivel '.$a.' <br>¿Cuantos aficionados assiteieron a ese partido?';
								?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								$result= $a+$b+$c;
								array_push($problem_real_result, $result);
								array_push($problem_data, $data);
								break;
							case 4:
								$total = rand(1,10);
								$a = $total*3;
								$b = $total;
								$c = rand(3,10);
								$data = 'Un autobus salio de la estación con '.$a.' personas, en su primera parada subieron, '.$b.'  personas mas. En la segunda parada se bajo la mitad los pasajeros. En la cuarta parada subieron '.$c.' personas. <br> ¿Cuantas personas viajan el autobus cuando este llega a su quinta parada?';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								$result = (($a+$b)/2)+$c;
								array_push($problem_real_result, $result);
								array_push($problem_data, $data);
								break;
							case 5:
								$total = rand(1,10);
								$divisor = rand(2,10);
								$a = $total*$divisor;
								$indicador = rand(1,6);
								$names = array(1=>'Alex',2=>'Beto',3=>'Lalo',4=>'Guillermo',5=>'Francisco',6=>'Octavio');
								$data = $names[$indicador].' tiene '.$a.' canicas, que quiere repartir en '.$total.' grupos.<br>¿De cuantas canicas estara compuesto cada grupo?';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								$result = $a / $total;
								array_push($problem_real_result, $result);
								array_push($problem_data, $data);
								break;
							case 6:
								$names = array(1=>'Daniel',2=>'Benjamin',3=>'Beto',4=>'Lalo',5=>'Marcos',6=>'Dario',7=>'Alfredo');
								$colors = array(1=>' rojas y negras',2=>' blancas y grises ',3=>' verdes y azules ');
								$indicador = rand(1,7);
								$indicador_2 = rand(1,3);
								$data = $names[$indicador].' tiene un cajon lleno de calcetas de 2 colores, '.$colors[$indicador_2].'<br>¿Cuantas calcetas tendra que sacar del cajon, sin ver, para formar un par del mismo color?';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								$result = 3;
								array_push($problem_real_result, $result);
								array_push($problem_data, $data);
								break;
							case 7:
								$pasajerosxbus = rand(20,40);
								$autobuses = rand(1,7);
								$totalpasajeros = $pasajerosxbus*$autobuses;
								$data = 'Para un viaje de excursion, se planea rentar autobuses con capadidad para '.$pasajerosxbus.' personas. El total de pasajeros es de '.$totalpasajeros.'<br>¿Cuántos autobuses se requieren?';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								$result = $totalpasajeros/$pasajerosxbus;
								array_push($problem_real_result, $result);
								array_push($problem_data, $data);
								break;
							case 8:
								$largo = rand(101,200);
								$ancho = rand(10,100);
								$area = $largo * $ancho;
								$data = 'Se tiene un terreno de '.$area.' metros cuadrados. Si su longitud es de '.$largo.' metros. ¿Cuanto sera su ancho?';?>
								<tr>
									<td><?php echo($i); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								array_push($problem_real_result, $ancho);
								array_push($problem_data, $data);
								break;
							case 9:
								//cubo
								$lado = rand(1,30);
								$data = 'Calcula el voluen de un cubo que sus lados miden '.$lado.' cm.';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								$result = $lado*$lado*$lado;
								array_push($problem_real_result, $result);
								array_push($problem_data, $data);
								break;
							case 10:
								$tiempo = rand(20,60);
								$kidcakeratio = rand(2,5);
								$data = 'Un niño come un pastel completo en '.$tiempo.' minutos.<br>¿Cuanto tiempo tardaran '.$kidcakeratio.' niños en comerse '.$kidcakeratio.' pasteles?';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								array_push($problem_real_result, $tiempo);
								array_push($problem_data, $data);
								break;
							case 11:
								$largo_calle = rand(50,100);
								$ancho_calle = rand(5,8);
								$adoquines = rand(20000,40000);
								$data = 'Una calle de '.$largo_calle.' metros de largo y '.$ancho_calle.' metros de ancho, se haya pavimentada con '.$adoquines.' adoquines.<br>¿Cuantos adoquienes se necesitaran para pavimentar otra calle de la mitad de ancho y dos terceras partes del largo?';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								$area = $largo_calle*$ancho_calle;
								$area2 = ($largo_calle*(2/3))*($ancho_calle/2);
								$result = ($area2 * $adoquines)/$area;
								$resultf = number_format($result, 2, '.','');

								array_push($problem_real_result, $resultf);
								array_push($problem_data, $data);
								break;
							case 12:
								$Large_box = rand(2,15);
								$indicador_12 = rand(1,3);
								$box_size = array(1=>'medianas',2=>'chicas',3=>'en total');
								$data = 'Un camion transporta cajas de carton de distintos tamaños, grande, mediana y pequeña. En cada caja caben 4 cajas de menor tamaño.<br>Si el camión transporta '.$Large_box.' cajas grandes.¿Cuantas cajas '.$box_size[$indicador_12].' lleva el camion?';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								if ($indicador_12==1){
									$result = $Large_box*4;
								}
								elseif ($indicador_12==2) {
									$result = $Large_box*4*4;
								}
								elseif ($indicador_12==3) {
									$result= ($Large_box*4*4)+$Large_box;
								}
								array_push($problem_real_result, $result);
								array_push($problem_data, $data);
								break;
							case 13:
								$alumnos_num = rand(100,500);
								$percetn_show = rand(1,99);
								$percetn_op = $percetn_show/100;
								$data = 'De los '.$alumnos_num.' alumnos de una escuela el '.$percetn_show.'% son mujeres. ¿Cuantos hombres hay?';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								$result = (1-$percetn_op)*$alumnos_num;
								array_push($problem_real_result, $result);
								array_push($problem_data, $data);
								break;
							case 14:
								$apple_pod = rand(500,700);
								$apple_num = $apple_pod*rand(5,70);
								$data = 'Un huerto produce '.$apple_num.' manzanas, de las cuales '.$apple_pod.' se pudrieron en la bodega ¿Que porcentaje de manzanas se aprovecho?.<br>Expresalo solo en numeros.';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								$apple_pod_per = ($apple_pod*100)/$apple_num;
								$result = 100-$apple_pod_per;
								$resultf = number_format($result, 2, '.','');
								array_push($problem_real_result, $resultf);
								array_push($problem_data, $data);
								break;
							case 15:
								$gatos = rand(2,15);
								$data = 'En una habitación hay gatos, cada uno ve '.$gatos.' gatos.<br>¿Cuantos gatos son en total?';?>
								<tr>
									<td><?php echo($i+1); ?></td>
									<td><?php echo ($data);?></td>
									<td><?php echo ('<br><input required="" type="text" name="answer'.$i.'"><br><br>');?></td>
								</tr>
								<?php
								$result = $gatos + 1;
								array_push($problem_real_result,$result);
								array_push($problem_data, $data);
								break;
						}
					}
					$_SESSION['problem_real_result']= $problem_real_result;
					$_SESSION['problem_data'] = $problem_data;
				?>

			</table>
			<input type="submit" value="ENVIAR"/>
			</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
