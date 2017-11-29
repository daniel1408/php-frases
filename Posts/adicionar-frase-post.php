<?php header("Content-Type: text/html; charset=ISO-8859-1",true);?>

<?php
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['user'])){
    $usuario = $_SESSION['user'];
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        $frase = filter_input(INPUT_GET, "frase");
        $autor = filter_input(INPUT_GET, "autor");
        $data = date('d/m/y');
        try {
            ini_set('default_charset', 'UTF-8');
            $conn = new PDO('mysql:host=127.0.0.1;dbname=frases', "daniel", "Furiosa");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->query("SET NAMES utf8");
            
            $stmt2 = $conn->prepare("SELECT * FROM autor where login = '$autor'");
            $stmt2->execute();
            $row = $stmt2->fetch();
            $nomeautor = $row['nome'];
            $stmt = $conn->prepare("insert into frase (texto, data, autor) values('$frase','$data', '$nomeautor');");
            if($stmt){
                $stmt->execute();
                header("Location: ../View/list-frases.php");
            }else{
                die("Erro:".mysqli_error($stmt));
            }
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();        
        }
    } else {
        header("location: ../index.php");
    }