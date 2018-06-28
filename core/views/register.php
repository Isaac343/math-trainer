<?php require_once("includes/connection.php");
include("includes/header.php");

	if(isset($_POST["register"])){
		if(!empty($_POST['full_name']) && !empty($_POST['username']) && !empty($_POST['password'])) {
			$full_name=$_POST['full_name'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

			$sql="SELECT * FROM usuarios WHERE username = '$username'";
			$result = $conn ->query($sql);
			if($result->num_rows > 0){

				$message = "El nombre de usuario ya existe! Por favor, intenta con otro!";
				if($result){
					$message = "Cuenta Correctamente Creada";
				} else {
					$message = "Error al ingresar datos de la informacion!";
				}
			} else {

				$sql="INSERT INTO usuarios (usuario, username, password) VALUES ('$full_name', '$username', '$password')";
				$result=$conn ->query($sql);
			}
			} else {
			$message = "Todos los campos no deben de estar vacios!";
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
<body style="padding-top:0px;">
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
		<div class="container mregister">
			<div id="login">
				<h1>Registrar</h1>
				<form name="registerform" id="registerform" action="register.php" method="post">
			 	<label for="user_login">Nombre Completo<br />
			 	<input type="text" name="full_name" id="full_name" class="input" size="32" value="" /></label>

			 	<label for="user_pass">Nombre De Usuario<br />
			 	<input type="text" name="username" id="username" class="input" value="" size="20" /></label>

			 	<label for="user_pass">Contraseña<br />
			 	<input type="password" name="password" id="password" class="input" value="" size="32" /></label>
			 	<p class="submit">
			 	<input type="submit" name="register" id="register" class="button" value="Registrar" />
			 	</p>
			 	<p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a></p>
			 	</form>
		 	</div>
	 	</div>

	 <?php include("includes/footer.php"); ?>

</body>
</html>
