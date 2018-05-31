<?php
session_start();
require_once('includes/connection.php');
include('includes/header.php');

	if(isset($_POST['login'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			$sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
			$result = $conn -> query($sql);
			if($result->num_rows != 0){

				while ($row=mysqli_fetch_assoc($result)) {
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
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
</head>
<body>
	<div class = 'container mlogin'>
		<div id = 'login'>
			<h1>Login</h1>
			<form name='loginform' id='loginform' action="login.php" method="POST">
				<div class="form-group">
          <label for="user_login">Nombre de Usuario</label>
  				<input type="text" name="username" id="username" class="input" value="" placeholder="Nombre de usuario" size="20" />
        </div>
				<div class="form-group">
          <label for="user_pass">Contraseña</label>
  				<input type="password" name="password" id="username" class="input" value="" placeholder="Contraseña" size="20"/>
        </div>
				<input type="submit" name="login" class="button" value="Entrar"/>
			<a href="register.php">Registrate aqui</a>

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
