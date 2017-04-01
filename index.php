<?php
/*
	Main function that starts the entire web application. 
	Tierney Irwin
*/
session_start();
require_once __DIR__ . '/vendor/autoload.php';
require_once 'config.inc.php';
use App\Database\DB as DB;
if (isset($_GET['controller']) && isset($_GET['action'])) 
{
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} 
else 
{
    $controller = 'main';
    $action = 'home';
}
ini_set('display_errors','on');


require_once ('views/layout.php');
?>
