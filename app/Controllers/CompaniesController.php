<?php
namespace App\Controllers;
use App\Renderer as Renderer;
use App\Models\Companies as Companies;

/**
 * AlgorithmsController class that accesses data from the
 * Algorithm model class and passes it to a rendering class
 * to be rendered as a view.
 *
 * @author dplante
 *
 */
class CompaniesController
{
    public function index()
    {
        $companies = Companies::all();
        $view = new Renderer('views/companies/');
        $view->companies = $companies;
        $view->render('index.php');
    }

    public function show()
    {
        if (!isset($_GET['id']))
            return route('home', 'error');
        $company = Companies::find($_GET['id']);
        $view = new Renderer('views/companies/');
        $view->company = $company;
        $view->render('show.php');
    }
    
}

