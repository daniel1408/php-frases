<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author daniel
 */
interface IDao {
    //put your code here
    public function  insert( $object);
    public function  delete( $object);
    public function  update( $object);
    public function  select( $object);
    public function  selectAll();
    public function selectLike($texto);
}
