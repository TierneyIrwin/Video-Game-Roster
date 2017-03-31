<?php
namespace App\Controllers;
use App\Renderer as Renderer;
use App\Models\Rating as Rating;

/**
 * AlgorithmsController class that accesses data from the
 * Algorithm model class and passes it to a rendering class
 * to be rendered as a view.
 *
 * @author dplante
 *
 */
class RatingController
{
	public function index()
	{
		$ratings = Rating::all();
		$view = new Renderer('views/rating/');
		$view->ratings = $ratings;
		$view->render('index.php');
	}

	public function show()
	{
		if (!isset($_GET['id']))
			return route('home', 'error');

		$rating = Rating::find($_GET['id']);
		$view = new Renderer('views/rating/');
		$view->rating = $rating;
		$view->render('show.php');
	}
	public function create(){
		$newrating = Rating::insertRating($_POST['author'], $_POST['date'],$_POST['website'],$_POST['rating']);
		$view = new Renderer('views/rating/');
		$view->newrating = $newrating;
		$view->render('create.php');
	}
	public function update(){
		$updated = Rating::updateRating($_POST['author'],$_POST['date'],$_POST['website'],$_POST['rating'], $_POST['id']);
		$view = new Renderer('views/rating/');
		$view->updated = $updated;
		$view->render('update.php');
	}
	public function delete(){
		$deleted = Rating::deleteRating($_POST['id']);
		$view = new Renderer('views/rating/');
		$view->deleted = $deleted;
		$view->render('delete.php');
	}
}

