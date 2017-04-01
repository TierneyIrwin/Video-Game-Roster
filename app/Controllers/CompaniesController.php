<?php
namespace App\Controllers;
use App\Renderer as Renderer;
use App\Models\Companies as Companies;

/**
 * CompaniesController class which accesses data from the Companies class to 
	give to the view to display. This controller handles the gateway
	between the model and the view
 *
 * @author TierneyIrwin
 *
 */
class CompaniesController
{
	//Here is where the entire table is taken to be displayed.
	public function index()
	{
		$companies = Companies::all();
		$view = new Renderer('views/companies/');
		$view->companies = $companies;
		$view->render('index.php');
	}
	//This function takes the specific data for the chosen company to be sent.
	public function show()
	{
		if (!isset($_GET['id']))
			return route('home', 'error');
		$company = Companies::find($_GET['id']);
		$view = new Renderer('views/companies/');
		$view->company = $company;
		$view->render('show.php');
	}
	//This function takes the information from the view to send to the database to create a new row in the companies table.
	public function create(){
		$newCompany = Companies::insertCompany($_POST['companyname'], $_POST['established'],$_POST['ceo'],$_POST['location']);
		$view = new Renderer('views/companies/');
		$view->newCompany = $newCompany;
		$view->render('create.php');
	}
	//This function updates a particular row with the values taken from the view.
	public function update(){
		$updated = Companies::updateCompany($_POST['companyname'],$_POST['established'],$_POST['ceo'],$_POST['location'], $_POST['id']);
		$view = new Renderer('views/companies/');
		$view->updated = $updated;
		$view->render('update.php');
	}
	//This function calls the model to delete the chosen row.
	public function delete(){
		$deleted = Companies::deleteCompany($_POST['id']);
		$view = new Renderer('views/companies/');
		$view->deleted = $deleted;
		$view->render('delete.php');
	}
}

