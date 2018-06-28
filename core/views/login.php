<?php
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
<h1>LOGIN</h1>
