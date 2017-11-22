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

    try {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=frases', "daniel", "Furiosa");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt2 = $conn->prepare("SELECT * FROM autor Where id='$id';");
        $stmt2->execute();
        $row = $stmt2->fetch();
        $nomeautor = $row['nome'];

        $stmt = $conn->prepare("delete from autor where id='$id'; delete from frase where autor='$nomeautor'");


        if($stmt){
            $stmt->execute();
            header("Location: index.php");
        }else{
            die("Erro:".mysqli_error($stmt));
        }

    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();        
    }

} else {
    header("location: index.php");
}