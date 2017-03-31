<?php
  use App\Controllers;
  
  function route($controller, $action) {
    
    switch($controller) {
      case 'main':
        $controller = new App\Controllers\MainController();
      break;
      case 'companies':
        $controller = new App\Controllers\CompaniesController();
      break;
      case 'videogames':
	$controller = new App\Controllers\VideogameController();
	break;
      case 'rating':
	$controller = new App\Controllers\RatingController();
	break;
    }

    $controller->{ $action }();
  }

  $controllers = array('main' => ['home', 'error'],
                       'companies' => ['index','show'],
			'rating' => ['index','show','create'],
			'videogames' => ['index','add', 'show','update','deleteVG']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      route($controller, $action);
    } else {
      route('main', 'error');
    }
  } else {
    route('main', 'error');
  }
?>
