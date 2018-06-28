<?php
	global $realresult;
	class Operaciones{

		function op_suma($data, &$realresult, &$op_string, $c){
			$_SESSION['global_level'];
			$a = rand($data[0], $data[1]);
			$b = rand($data[0], $data[1]);
			$result = $a+$b;
			$string = ' '.$a.' + '.$b.' = ';
			array_push($realresult, $result);
			array_push($op_string, $string);

			?>
			<tr>
				<td><?php echo $c; ?>	</td>
				<td><?php echo('  '.$a.' + '.$b.' = ');?></td>
				<td><?php echo'<input required="" type="text" name="answer'.$c.'">'?></td>
			</tr><?php
		}
		function op_resta($data, &$realresult, &$op_string, $c){
			$_SESSION['global_level'];
			$a = rand($data[2], $data[3]);
			$b = $a + rand($data[2], $data[3]);
			$result = $b - $a;
			$string = ' '.$b.' - '.$a.' = ';
			array_push($realresult, $result);
			array_push($op_string, $string);?>
			<tr>
				<td><?php echo $c; ?>	</td>
				<td><?php echo(' '.$b.' - '.$a.' = ');?></td>
				<td><?php echo'<input required="" type="text" name="answer'.$c.'">'?></td>
			</tr>
				<?php
		}
		function op_multi($data, &$realresult, &$op_string, $c){
			$_SESSION['global_level'];
			$a = rand($data[4], $data[5]);
			$b = rand($data[4], $data[5]);
			$result = $a*$b;
			$string = ' '.$a.' * '.$b.' = ';
			array_push($realresult, $result);
			array_push($op_string, $string);?>
			<tr>
				<td><?php echo $c; ?>	</td>
				<td><?php echo (' '.$a.' x '.$b.' = '); ?></td>
				<td><?php echo'<input required="" type="text" name="answer'.$c.'">'?></td>
			</tr>
				<?php
		}
		function op_div($data, &$realresult, &$op_string, $c){
			$_SESSION['global_level'];
			$b = rand($data[6], $data[7]);
			$a = $b * rand($data[6], $data[7]);
			$result = $a/$b;
			$string = ' '.$a.' / '.$b.' = ';
			array_push($realresult, $result);
			array_push($op_string, $string);?>
			<tr>
				<td><?php echo $c; ?>	</td>
				<td><?php echo (' '.$a.' / '.$b.' = ');?></td>
				<td><?php echo'<input required="" type="text" name="answer'.$c.'">'?></td>
			</tr>
				<?php
		}
	}
 ?>
<div class="container-fluid">
	<div class="main-container-ii">
		<div class="container">
			<div class="navbar">
			</div>
			<div class="description">
			<h1>OPERACIONES ARITMETICAS BASICAS</h1>
			<br>
			<p>Responde las siguientes operaciones basicas. No uses calculadora. Recuerda que "La practica, hace al maestro".
			</div>
			<div class="simple_op_table">
				<form action="simple_op_check.php" method="POST">
				<table>
					<tr>
						<th>No.</th>
						<th>OPERACION</th>
						<th>RESPUESTA</th>
					</tr>
				<?php
					if (isset($_SESSION['realresult'])and isset($_SESSION['opdata'])){
						unset($_SESSION['realresult']);
						unset($_SESSION['opdata']);
					}
					//session_start();
					$level = $_POST['dif'];
					$result = 0;
					switch ($level) {
						case 1:
							$data = array(0, 99, 0, 99, 1, 10, 1, 10);
							$_SESSION['global_level']=1;
							break;
						case 2:
							$data = array(100, 999, 100, 999, 1, 15, 1, 15);
							$_SESSION['global_level']=2;
							break;
						case 3:
							$data = array(1000, 3000, 100, 999, 0, 15, 1, 15);
							$_SESSION['global_level']=3;
							break;
					}
					$realresult = array();
					$op_string = array();
					for ($c=1; $c < 11; $c++) {
						$ope=rand(1, 4);
						switch ($ope) {
							case 1:
								$call = new Operaciones;
								$call -> op_suma($data, $realresult, $op_string, $c);
								break;
							case 2:
								$call = new Operaciones;
								$call -> op_resta($data, $realresult, $op_string, $c);
								break;
							case 3:
								$call = new Operaciones;
								$call -> op_multi($data, $realresult, $op_string, $c);
								break;
							case 4:
								$call = new Operaciones;
								$call -> op_multi($data, $realresult, $op_string, $c);
								break;
						}
					}
					//print_r( $realresult);
					$_SESSION['realresult']= $realresult;
					$_SESSION['opdata'] = $op_string;
				?>
				</table>
			</div>
			<div calss="action">
				<input type="submit" name="Enviar" value="Enviar">
			</div>
			</form>
		</div>
	</div>
</div>
