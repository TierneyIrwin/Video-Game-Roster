<?php
namespace App\Controllers;
use App\Renderer as Renderer;
use App\Models\Rating as Rating;

/**
 * RatingController class that accesses data from the
 * Rating model class and passes it to a rendering class
 * to be rendered as a view.
 *
 * @author TierneyIrwin
 *
 */
class RatingController
{
	//Accesses the entire table to be rendered for the view.
	public function index()
	{
		$ratings = Rating::all();
		$view = new Renderer('views/rating/');
		$view->ratings = $ratings;
		$view->render('index.php');
	}
	//Accesses the specific row based on the id taken from the view and renders the information to be shown.
	public function show()
	{
		if (!isset($_GET['id']))
			return route('home', 'error');

		$rating = Rating::find($_GET['id']);
		$view = new Renderer('views/rating/');
		$view->rating = $rating;
		$view->render('show.php');
	}
	//Sends the information taken from the view to the model to be created.
	public function create()
	{
		$newrating = Rating::insertRating($_POST['author'], $_POST['date'],$_POST['website'],$_POST['rating']);
		$view = new Renderer('views/rating/');
		$view->newrating = $newrating;
		$view->render('create.php');
	}
	//Takes the information from the view to give to the model to update the specified row in the rating table.
	public function update()
	{
		$updated = Rating::updateRating($_POST['author'],$_POST['date'],$_POST['website'],$_POST['rating'], $_POST['id']);
		$view = new Renderer('views/rating/');
		$view->updated = $updated;
		$view->render('update.php');
	}
	//Takes the information from the view to the model to delete the specified row.
	public function delete()
	{
		$deleted = Rating::deleteRating($_POST['id']);
		$view = new Renderer('views/rating/');
		$view->deleted = $deleted;
		$view->render('delete.php');
	}
}

