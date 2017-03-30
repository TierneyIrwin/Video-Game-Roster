<?php
namespace App\Controllers;
use App\Renderer as Renderer;

class MainController
{
	public function home()
	{
		$title = 'Welcome';

		$view = new Renderer('views/main/');
		$view->title = $title;
		$view->render('home.php');
	}

	public function error()
	{
		$view = new Renderer('views/main/');
		$view->render('error.php');
	}
}
