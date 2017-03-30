<?php
namespace App\Controllers;
use App\Renderer as Renderer;
use App\Models\Videogame as Videogame;

class VideogameController
{
	public function index()
	{
		$videogames = Videogame::complete();
		$view = new Renderer('views/videogames/');
		$view->videogames = $videogames;
		$view->render('index.php');
	}

	public function show()
	{
		if(!isset($_GET['vg_name']))
			return route('home','error');
		$videogame = Videogame::find($_GET['vg_name']);
		$view = new Renderer('views/videogames/');
		$view->videogame = $videogame;
		$view->render('show.php');
	}
}
