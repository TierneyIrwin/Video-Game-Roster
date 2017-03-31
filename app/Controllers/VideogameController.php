<?php
namespace App\Controllers;
use App\Renderer as Renderer;
use App\Models\Videogame as Videogame;

class VideogameController
{
	public function index()
	{
		$videogames = Videogame::all();
		$view = new Renderer('views/videogames/');
		$view->videogames = $videogames;
		$view->render('index.php');
	}

	public function show()
	{
		if(!isset($_GET['id']))
			return route('home','error');
		$videogame = Videogame::find($_GET['id']);
		$view = new Renderer('views/videogames/');
		$view->videogame = $videogame;
		$view->render('show.php');
	}
}
