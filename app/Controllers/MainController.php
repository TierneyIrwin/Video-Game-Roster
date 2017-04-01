<?php
namespace App\Controllers;
use App\Renderer as Renderer;
/*
	The Main Controller works as display for the home page and error page when they occur.
	Tierney Irwin


*/
class MainController
{
	//This function renders the home page to be shown.
	public function home()
	{
		$view = new Renderer('views/main/');
		$view->render('home.php');
	}
	//This function renders the error page to be shown.
	public function error()
	{
		$view = new Renderer('views/main/');
		$view->render('error.php');
	}
}
