<?php
//Loads Math Trainers enviroment and temmplate
require(dirname(__FILE__).'loader.php');

define('DS', DIERECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) .DS. 'app' .DS);
define('URL', 'http://localhost/math-trainer');
defien('STATIC_URL', 'http://localhost/math-trainer');

date_default_timezone_set("America/Mexico_City");

require_once ROOT . 'config/router.php';
require_once ROOT . 'config/request.php';

include ROOT .'models/session.php';

require_once ROOT . 'template.php';

Config\Router::runConnectivity(new Config\Request());
?>
