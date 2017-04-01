<?php
namespace App\Controllers;
use App\Renderer as Renderer;
use App\Models\Videogame as Videogame;
use App\Models\Companies as Companies;
use App\Models\Rating as Rating;
/*
	VideogameController class accesses the model to give to the
	render class to be rendered for the view to display.
	@author TierneyIrwin
*/
class VideogameController
{
	//Accesses the model to render all information from the videogame table to send to ethe view.
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
	//Accesses the specified row to render the information to the view.
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
		$comid = $view->videogame->comid;
		$ratid = $view->videogame->ratid;
		$view->company = Companies::find($comid);
		$view->rating = Rating::find($ratid);
		$view->render('show.php');
	}
	//Takes information from the view to give to the model to create a new row in the videogame table.
	public function create(){
		$newVG = Videogame::insertVG($_POST['vg_name'], $_POST['release_date'],$_POST['platform'],$_POST['genre'], $_POST['company'],$_POST['rating']);
		$view = new Renderer('views/videogames/');
		$view->newVG = $newVG;
		$view->render('create.php');
	}
	//Takes the information from the view to give to the model to update the specified row.
	public function update()
	{

		$updated = Videogame::updateVG($_POST['vg_name'],$_POST['release_date'],$_POST['platform'],$_POST['genre'],$_POST['company'],$_POST['rating'], $_POST['id']);
		$view = new Renderer('views/videogames/');
		$view->updated = $updated;
		$view->render('update.php');
	}
	//Takes the specified id the delete the row with the corresponding id.
	public function delete()
	{
		$deleted = Videogame::deleteVG($_POST['id']);
		$view = new Renderer('views/rating/');
		$view->deleted = $deleted;
		$view->render('delete.php');
	}
}
