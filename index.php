<?php
  // Definiciones
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	define('URL', 'http://localhost/aviator/');
	session_start();
	function sessionRequired(){
			if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true){
				header("LOCATION: ".URL."");
			  exit;
			}
	}
	require_once 'core/router.php';
	require_once 'core/request.php';
  // Llamamos a la plantilla base de toda la plataforma
	require_once 'core/views/template.php';
	$router = new Router;
  $router->run();
?>
