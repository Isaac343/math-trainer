<?php
session_start();
?>
<?php require_once('includes/connection.php');?>
<?php include('includes/header.php');?>
<?php
	if(isset($_POST['login'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$query = mysql_query("SELECT * FROM usuarios WHERE username='$username' AND password='$password'"); //llamar datos desde la base de datos
			$numrows = mysql_num_rows($query);
			if($numrows !=0){

				while ($row=mysql_fetch_assoc($query)) {
					$dbusername = $row['username'];
					$dbpassword = $row['password'];
					$_SESSION['idusername'] = $row['id'];
				}
				if ($username == $dbusername && $password == $dbpassword){
					$_SESSION['session_username']=$username;

					echo $_SESSION['idusername'];
				if(isset($_SESSION['session_username'])){
					header('Location: asd.php');
				}

				} elseif ($username != $dbusername or $password != $dbpassword){
					$message = "Nombre de usuario o contraseña invalida";
				} else{
					$message = "Todos los campos son requeridos";
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PE6°P</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="css/loginstyle.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
	<div class = 'container mlogin'>
		<div id = 'login'>
			<h1>LOGIN</h1>
			<form name='loginform' id='loginform' action="login.php" method="POST">
			<p>
				<label for="user_login">NOMBRE DE USUARIO<br>
				<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
			</p>
			<p>
				<label for="user_pass">CONTRASEÑA<br>
				<input type="password" name="password" id="username" class="input" value="" size="20"/></label>
			</p>
			<p class="submit">
				<input type="submit" name="login" class="button" value="Entrar"/>
			</p>
			<a href="register.php"> Registrate aqui</a>

			</form>
		</div>
</div>
<?php if (!empty($message)) {
	echo "<p class=\"error\">"."MESSAGE: ".$message."</p>";
}
?>
<?php include("includes/footer.php"); ?>
</body>
</html>
