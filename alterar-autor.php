<?php header("Content-Type: text/html; charset=ISO-8859-1",true);?>
<?php
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['user'])){
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        $login = filter_input(INPUT_GET, "login");
        $nascimento = filter_input(INPUT_GET, "nascimento");
        $id = filter_input(INPUT_GET, "id");
        $nome = filter_input(INPUT_GET, "nome");

        try {
            $conn = new PDO('mysql:host=127.0.0.1;dbname=frases', "daniel", "Furiosa");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM autor where id = '$id'");
            $stmt->execute();
            $row = $stmt->fetch();
            $nomeautor = $row['nome'];

            $stmt2 = $conn->prepare("update autor set nome = '$nome', nascimento = '$nascimento', login = '$login' where id='$id';");    
            $stmt3 = $conn->prepare("update frase set autor = '$nome' where autor='$nomeautor';");

            if($stmt2){
                $stmt2->execute();
                $stmt3->execute();
                header("Location: minhas-frases.php");
            }else{
                die("Erro:".mysqli_error($stmt));
            }

        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();        
        }
} else {
        header("location: index.php");
    }