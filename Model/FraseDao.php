<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FraseDao
 *
 * @author daniel
 */


class FraseDao implements IDao{
    
    public function connectionString(){
        $conn = new PDO('mysql:host=127.0.0.1;dbname=frases', "daniel", "Furiosa");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    
    public function selectAll() {
        
        $conn = connectionString();
        
        $stmt = $conn->prepare("SELECT * FROM frase");
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row;
    }
    
    public function select( $object) {
        $conn = connectionString();
        
        $stmt = $conn->prepare("SELECT * FROM frase where autor = '$object.nome'");
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row;
    }
    
    public function insert( $object) {
        $conn = connectionString();
        
        $stmt = $conn->prepare("insert into frase (texto, data, autor) values('$object.texto','$object.data', '$object.autor');");
        $stmt->execute();
    }
    
    public function update( $object) {
        $conn = connectionString();
        
        $stmt = $conn->prepare("update frase set texto = '$object.texto', data = '$object.data' where id='$object,id';");    
        $stmt->execute();
    }
    
    public function delete( $object) {
        $conn = connectionString();
        
        $stmt = $conn->prepare("delete from frase where id='$object.id';");
        $stmt->execute();
    }
}
