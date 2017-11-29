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
class PostsController
{    
    public function addFrase() {
      require_once('View/Post/adicionar-frase-post.php');
    }
    
    public function editAutor() {
      require_once('View/POst/alterar-autor-post.php');
    }
    
    public function editFrase() {
      require_once('View/Post/alterar-frase-post.php');
    }
    
    public function deleteAutor() {
      require_once('View/Post/excluir-autor-post.php');
    }
    
    public function deleteFrase() {
      require_once('View/Post/excluir-frase-post.php');
    }
}

 
