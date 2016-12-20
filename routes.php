<?php

  function call($controller, $action, $auth) {
    // require the file that matches the controller name
    require_once('controllers/' . $controller . '_controller.php');
  // create a new instance of the needed controller
    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;

      case 'electeurs':
        // we need the model to query the database later in the controller
        require_once('models/electeur.php');
        $controller = new ElecteurController();
      break;

      case 'resultats':
        require_once('models/candidat.php');
        $controller = new ResultatsController();
      break;

      case 'enregistrement':
        $controller = new EnregistrementController();
      break;
    }


    // call the action
    $controller->{ $action }($auth);
}


      // just a list of the controllers we have and their actions
  // we consider those "allowed" values
  $controllers = array('pages' => ['home', 'login', 'voter', 'enregistrement','signup', 'candidat', 'resultats', 'resultatsExcel'],
                        'electeur' => ['index','create'],
                          'resultats' => ['afficher'],
                          'enregistrement' => ['save', 'electeur', 'candidat']);


   // check that the requested controller and action are both allowed
  // if someone tries to access something else he will be redirected to the error action of the pages controller


  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action, $auth);
    } else {

      call('pages', 'error404');
    }
  } else {

    call('pages', 'error404');
  }

?>