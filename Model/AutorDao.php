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

class AutorDao implements IDao{
    //put your code here
    public function connectionString(){
        $conn = new PDO('mysql:host=127.0.0.1;dbname=autor', "daniel", "Furiosa");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    
    public function selectAll() {
        
        $conn = connectionString();
        
        $stmt = $conn->prepare("SELECT * FROM autor");
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row;
    }
    
    public function select( $object) {
        $conn = connectionString();
        
        $stmt = $conn->prepare("SELECT * FROM autor where id = '$object.id'");
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row;
    }
    
    public function insert( $object) {
        $conn = connectionString();
        
        $stmt = $conn->prepare("insert into autor (nome, nascimento, login, senha) values ('$object.nome','$object.nascimento','$object.login','$object.senha')");
        $stmt->execute();
    }
    
    public function update( $object) {
        $conn = connectionString();
        
        $stmt = $conn->prepare("update autor set nome = '$object.nome', nascimento = '$object.nascimento', login = '$object.login' where id='$object.id';");    
        $stmt->execute();
    }
    
    public function delete( $object) {
        $conn = connectionString();
        
        $stmt = $conn->prepare("delete from autor where id='$object.id'");
        $stmt->execute();
    }
}
