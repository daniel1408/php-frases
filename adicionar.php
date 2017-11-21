<?php header("Content-Type: text/html; charset=ISO-8859-1",true);?>
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$frase = filter_input(INPUT_GET, "frase");
$autor = filter_input(INPUT_GET, "autor_id");
$data = date('d/m/y');


try {
    $conn = new PDO('mysql:host=127.0.0.1;dbname=frases', "daniel", "Furiosa");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("insert into frase (texto, data, autor_id) values('$frase','$data', $autor);");
    
    if($stmt){
        $stmt->execute();
        header("Location: index.php");
    }else{
        die("Erro:".mysqli_error($stmt));
    }

} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();        
}