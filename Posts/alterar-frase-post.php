<?php header("Content-Type: text/html; charset=ISO-8859-1",true);?>
<?php
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['user'])){
        /* 
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

        $texto = filter_input(INPUT_GET, "texto");
        $id = filter_input(INPUT_GET, "id");
        $data = date('d/m/y');

        require_once('../Model/FraseDao.php');
        require_once('../Model/Frase.php');
        try {
            $frase = new Frase();
            $frase->setTexto($texto);
            $frase->setData($data);
            $frase->setId($id);
            
            $stmt = FraseDao::update($autor);
            header("Location: ../View/list-frases.php");

        } catch (PDOException $e) {
            die("Erro:".mysqli_error($stmt));
            echo 'ERROR: ' . $e->getMessage();        
        }

} else {
        header("location: ../index.php");
    }