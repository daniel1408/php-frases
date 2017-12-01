<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AutorDao
 *
 * @author daniel
 */
require_once('IDao.php');

class AutorDao implements IDao{
    //put your code here
    public function connectionString(){
        ini_set('default_charset', 'UTF-8');
        $conn = new PDO('mysql:host=127.0.0.1;dbname=frases', "daniel", "Furiosa");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->query("SET NAMES utf8"); 
        return $conn;
    }        
    
    public function selectAll() {
        
        $conn = AutorDao::connectionString();
        $stmt = $conn->prepare("SELECT * FROM autor");
        $stmt->execute();

        return $stmt;
    }
    
    public function select( $object) {
        $conn = AutorDao::connectionString();

        $stmt = $conn->prepare("SELECT * FROM autor where id = '$object' order by nome");
        $stmt->execute();
        
        return $stmt;
    }
    
    public function selectForUserName( $username) {
        $conn = AutorDao::connectionString();

        $stmt = $conn->prepare("SELECT * FROM autor where login = '$username'");
        $stmt->execute();
        return $stmt;
    }
    
    public function login( $username, $password) {
        $conn = AutorDao::connectionString();

        $stmt = $conn->prepare("SELECT * FROM autor WHERE login = '$username' and senha = '$password'");
        $stmt->execute();
        return $stmt;
    }
    
    public function insert( $object) {
        
        $conn = AutorDao::connectionString();
        $stmt = $conn->prepare("insert into autor (nome, nascimento, login, senha) values ('$object->nome','$object->nascimento','$object->login','$object->senha')");
        $stmt->execute();
    }
    
    public function update( $object) {
        $conn = AutorDao::connectionString();
        
        $stmt = $conn->prepare("update autor set nome = '$object->nome', nascimento = '$object->nascimento', login = '$object->login' where id='$object->id';");
        $stmt->execute();
    }
    
    public function delete( $object) {
        $conn = AutorDao::connectionString();
        
        $stmt = $conn->prepare("delete from autor where id='$object'");
        $stmt->execute();
    }

    public function selectLike($texto) {
            
        $conn = AutorDao::connectionString();
        $stmt = $conn->prepare("SELECT * FROM autor where nome like '$texto%' order by id");
        $stmt->execute();
        
        return $stmt;
    }

}
