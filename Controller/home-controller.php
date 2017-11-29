<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author daniel
 */
class HomeController
{
    
    public function login() {
      require_once('View/login.php');
    }

    public function sign() {
      require_once('View/sing-view.php');
    }
    
    public function addFrase() {
      require_once('View/adicionar-frase-view.php');
    }
    
    public function listFrases() {
      $variavel = 'TEste';
      require_once('View/list-frases.php');
    }
    
    public function editFrase() {
      require_once('View/alterar-frase-view.php');
    }
    
    public function listAutores() {
      require_once('View/autores.php');
    }
    
    public function editAutor() {
      require_once('View/alterar-autor-view.php');
    }
    
    public function home() {
      require_once('View/home.php');
    }
    
    public function logout() {
      require_once('View/logout.php');
    }
}

 
