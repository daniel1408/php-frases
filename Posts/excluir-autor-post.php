<?php header("Content-Type: text/html; charset=ISO-8859-1",true);?>

<?php
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['user'])){
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        $id = filter_input(INPUT_GET, "id");

        spl_autoload_register(function ($class_name) {
            include '../Model/' . $class_name . '.php';
        });
        
        try {
            $stmt = AutorDao::select($id);
            $row = $stmt->fetch();
            $nomeautor = $row['nome'];
            
            AutorDao::delete($id);
            FraseDao::deleteForAutor($nomeautor);
            
            header("Location: ../index.php");
        } catch (PDOException $e) {
            die("Erro:".mysqli_error($stmt));
            echo 'ERROR: ' . $e->getMessage();        
        }
        
} else {
    header("location: index.php");
}