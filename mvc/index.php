<?php


$_production_mode = 1;

require_once("app/controllers/Router_Controller.php");

//--------------------------------------define constants
if ($_production_mode == 0)
{
	define('_program_path', 	"mvc1/mvc");
	define('_base_url', 		"http://127.0.0.1:8080/"._program_path."/index.php/");
	ini_set( "display_errors", 	"1" );	
}
else
{
	define('_program_path', 	"mvc");
	define('_base_url', 		"http://127.0.0.1:8080/"._program_path."/index.php/");
	ini_set( "display_errors", 	"0" );
	error_reporting(0);
}
//--------------------------------------define constants

$controller = new Router_Controller();
$controller->run_router();

?>