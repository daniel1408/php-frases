<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['user'])){
    $usuario = $_SESSION['user'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <?php header("Content-Type: text/html; charset=ISO-8859-1",true);?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Banco de Frases</title>
    </head>
    
    <body>    
        <div style="background-color: black; color: white">
            <a class="btn btn-default" href="../View/home.php" style="margin:5px">Home</a>
            <a class="btn btn-default" href="../View/autores.php" style="margin:5px">Autores</a>
            <a class="btn btn-default" href="../View/logout.php" style="margin:6px">Logout</a>
            <span style="margin-left: 40%; font-size: 30px; font-weight: bold">Minhas Frases</span>
        </div>
        
        <div class="container">
            <div class="row">
                <?php
                    try {
                        $conn = new PDO('mysql:host=127.0.0.1;dbname=frases', "daniel", "Furiosa");
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        $stmt2 = $conn->prepare("SELECT * FROM autor Where login = '$usuario'");
                        $stmt2->execute();
                        $row = $stmt2->fetch();                        
                        $nomeusuario = $row['nome'];
                        
                        $stmt = $conn->prepare("SELECT * FROM frase where autor = '$nomeusuario'");
                        $stmt->execute();
                        
                ?>
                <div class="col-md-4" style="margin: 1.4% 0;">
                    <div style="position: fixed;" >
                        <ul class="list-group">
                            <li class="list-group-item active"><h3><b>Dados de usuario</h3></b></li>
                            <li class="list-group-item"><h4><b><?php echo "Nome: ". $row['nome']?></h4></b></li>
                            <li class="list-group-item"><?php echo "Nascimento: ". $row['nascimento']?></li>
                            <li class="list-group-item"><?php echo "Login: ". $row['login']?></li>
                        </ul>
                        <a class="btn btn-warning" href="<?php echo "../View/alterar-autor-view.php?&id=". $row['id'] . "&nome=" . $row['nome'] . "&nascimento=" . $row['nascimento']. "&login=" . $row['login']?>">Editar Informacoes</a>
                        <a class="btn btn-danger" href="<?php echo "../Controller/excluir-autor.php?&id=". $row['id']?>">Excluir minha conta</a>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div style="margin:15px;height: 50px;">
                        <a href="../View/adicionar-frase-view.php" class="btn btn-default btn-block btn-lg">
                            Adicionar
                        </a>
                    </div>
                    <?php
                            while($row = $stmt->fetch()) {
                    ?>

                    <div class="card" style="margin: 10px;display: inline-block; width: 73rem; background-color: white; padding: 6px;box-shadow: 0px 7px 40px -1px rgba(0,0,0,0.75); ">
                        <div class="card-body">
                            <h4 style="color:black; font: italic  15px/30px Georgia, serif; " class="card-text"><b>Frase: </b> <?php echo $row['texto']?></h4>                            
                            <h6 class="card-subtitle mb-2 text-muted"><b>Data: <?php echo $row['data']?></b></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><b>Autor: <?php echo $row['autor']?></b></h6>
                            <div style="margin: 0 0">
                                <a class="btn btn-warning" href="<?php echo "../View/alterar-frase-view.php?&id=". $row['id'] . "&texto=" . $row['texto'] . "&data=" . $row['data']. "&autor_id=" . $row['autor_id']?>">Editar</a>
                                <a class="btn btn-danger" href="<?php echo "../Controller/excluir-frase.php?&id=". $row['id']?>">Excluir</a>
                            </div>

                        </div>
                    </div>

                    <?php

                            }
                        } catch (PDOException $e) {
                            echo 'ERROR: ' . $e->getMessage();
                        }
                    ?>        
                </div>
            </div>
        </div>
            
            
    </body>
</html>
<?php
    } else {
        header("location: ../index.php");
    }