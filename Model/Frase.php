<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Frase
 *
 * @author daniel
 */
class Frase {
    function getId() {
        return $this->id;
    }

    function getTexto() {
        return $this->texto;
    }

    function getData() {
        return $this->data;
    }

    function getAutor() {
        return $this->autor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }
}
