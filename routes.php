<?php

  function call($controller, $action) {
    
    require_once('Controller/' . $controller . '-controller.php');

    switch($controller) {
      case 'home':
        $controller = new HomeController();
      break;
      case 'posts':
        $controller = new PostsController();
      break;
    }

    $controller->{ $action }();
  }

  $controllers = array('home' => ['login', 'sign, addFrase, listFrases, editFrase, listAutores, editAutor, home, logout'],
                       'posts' => ['addFrase', 'editAutor', 'editFrase', 'deleteAutor', 'deleteFrase']);

  
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('home', 'login');
    }
  } else {
    call('home', 'login');
  }
