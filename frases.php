<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <?php header("Content-Type: text/html; charset=ISO-8859-1",true);?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Banco de Frases</title>
        
    <div style="height: 50px; background: #3A3838">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-inline">
            <div>
                <img src="https://ffescritor.files.wordpress.com/2014/05/chat-icon3.png" style="width:50px">
                <input class="form-control" type="text" name="parametro" placeholder="Qual frase deseja buscar hoje?" style="width:40%; margin: 6px 0 6px 22%;"/>
                <input class="btn btn-info" type="submit" value="Buscar"/>
            </div>
        </form>
    </div>
        
    </head>
    <body style="background-color:#F0EEEE">
        <div class="container-fluid">
            <h2 class="text-center"><b>Banco de Frases</b></h2>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-center"><b>Usuario</b></h3>
                    <ul class="list-group">
                        <li class="list-group-item active">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <a class="btn btn-info" href="<?php echo "alterar-pagina.php?&id=". $row['id'] . "&texto=" . $row['texto'] . "&data=" . $row['data']. "&autor_id=" . $row['autor_id']?>">Editar Informacoes</a>
                </div>
                <div class="col-md-8">
                    <div style="margin:15px;">
                        <a href="adicionar-pagina.html" class="btn btn-info ">
                            Adicionar
                        </a>
                    </div>

                    <?php
                        try {
                            $conn = new PDO('mysql:host=127.0.0.1;dbname=frases', "daniel", "Furiosa");
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $parametro = filter_input(INPUT_GET, "parametro");
                            if($parametro){             
                                $stmt = $conn->prepare("SELECT * FROM frase where texto like '$parametro%' order by id");
                            }else{
                                $stmt = $conn->prepare('SELECT * FROM frase;');
                            }
                            $stmt->execute();


                            while($row = $stmt->fetch()) {
                    ?>

                    <div class="card" style="margin: 10px;display: inline-block; width: 40rem; background-color: white; padding: 4px; border-radius: 11px; box-shadow: 0px 7px 40px -1px rgba(0,0,0,0.75); ">
                        <div class="card-body">
                            <h4 style="color:black; font: italic  15px/30px Georgia, serif; " class="card-text"><b>Frase: </b> <?php echo $row['texto']?></h4>
                            <h6 class="card-subtitle mb-2 text-muted"><b>Autor: <?php echo $row['autor_id']?></b></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><b>Data: <?php echo $row['data']?></b></h6>
                            <div style="width:60%; margin: 0 auto">
                                <a class="btn btn-info" href="<?php echo "alterar-pagina.php?&id=". $row['id'] . "&texto=" . $row['texto'] . "&data=" . $row['data']. "&autor_id=" . $row['autor_id']?>">Editar</a>
                                <a class="btn btn-info" href="<?php echo "excluir.php?&id=". $row['id']?>">Excluir</a>
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
