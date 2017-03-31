<?php
namespace App\Controllers;
use App\Renderer as Renderer;
use App\Models\Videogame as Videogame;
use App\Models\Companies as Companies;
use App\Models\Rating as Rating;
class VideogameController
{
	public function index()
	{
		$videogames = Videogame::joins();
		$view = new Renderer('views/videogames/');
		$view->videogames = $videogames;
		$companylist = Companies::all();
		$view->companylist = $companylist;
		$ratinglist = Rating::all();
		$view->ratinglist = $ratinglist;
		$view->render('index.php');
	}

	public function show()
	{
		if(!isset($_GET['id']))
			return route('home','error');
		$companylist = Companies::all();
		$ratinglist = Rating::all();
		$videogame = Videogame::find($_GET['id']);
		$view = new Renderer('views/videogames/');
		$view->videogame = $videogame;
		$view->companylist = $companylist;
		$view->ratinglist = $ratinglist;
		$view->render('show.php');
	}
	public function create(){
		$newVG = Videogame::insertVG($_POST['vg_name'], $_POST['release_date'],$_POST['platform'],$_POST['genre'], $_POST['company'],$_POST['rating']);
		$view = new Renderer('views/videogames/');
		$view->newVG = $newVG;
		$view->render('create.php');
	}
	public function update(){

		$updated = Videogame::updateVG($_POST['vg_name'],$_POST['release_date'],$_POST['platform'],$_POST['genre'],$_POST['company'],$_POST['rating'], $_POST['id']);
		$view = new Renderer('views/videogames/');
		$view->updated = $updated;
		$view->render('update.php');
	}
	public function delete(){
		$deleted = Videogame::deleteVG($_POST['id']);
		$view = new Renderer('views/rating/');
		$view->deleted = $deleted;
		$view->render('delete.php');
	}
}
